<?php

namespace App\Http\Controllers;

use App\AnnDesc;
use App\AnnFile;
use App\Announcement;
use App\File;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;

class AnnouncementController extends Controller
{
    private function uploadHandle($request,$announcement)
    {
        if(str_contains($request->Input('link'),'https://www.youtube.com/watch?v=')) {
            $video_id = str_after($request->Input('link'),'https://www.youtube.com/watch?v=');
            $announcement->video_id = $video_id;
        }
        $announcement->link = $request->Input('link');
        $announcement->title = $request->Input('title');
        $announcement->save();
    }

    private function fileUpload($request, $file, $annFile = null)
    {
        if (Route::getCurrentRoute()->getName() == 'announcement.store') {
            $annFile = new AnnFile;
        } 
        $filename = $file->getClientOriginalName();
        if(str_contains($file->getMimeType(), 'video')) {
            $location = public_path("video/");
        } else {
            $location = public_path("file/");
        }
        $file->move($location, $filename);
        $annFile->file = $filename;
        if (Route::getCurrentRoute()->getName() == 'announcement.store') {
            $annFile->announcement_id = $request->input('ann_id');
        } 
        $annFile->save();
    }

    private function session()
    {
        if(Auth::check() == true) {
            return Auth::user()->username;
        }
        return ;
    }

    public function index()
    {
        $session = $this->session();
        $users = User::where(['username'=>$session])->get();
        $selfs = Announcement::where(['username'=>$session])->latest()->get();
        $generals = Announcement::latest()->get();
        if (Announcement::withTrashed()->latest()->first() == true) {
            $ann_id = Announcement::withTrashed()->latest()->first()->id + 1;
        } else {
            $ann_id = 1;
        }
        // dd(Announcement::withTrashed()->latest()->first());

		return view('layout.announcement.index', ['users'=>$users, 'generals'=>$generals, 'selfs'=>$selfs, 'ann_id'=>$ann_id]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'title'=>'required',
			// 'description[0]'=>'required|max:5000'
		]);

        foreach($request->Input('description') as $descriptions) {
            if ($descriptions != null) {
                $ann_desc = new AnnDesc;
                $ann_desc->announcement_id = $request->Input('ann_id');
                $ann_desc->description = $descriptions;
                $ann_desc->save();
            } else {
                 $this->validate($request, [
                    $descriptions =>'required|max:5000'
                ]);
            }
        }

		$announcement = new Announcement;
		$announcement->username = $request->Input('username');
		$announcement->propic = $request->Input('propic');

		$this->uploadHandle($request,$announcement);

        $files = $request->file('file');
        if(Input::hasFile('file')) {
            foreach ($files as $file) {
                $this->fileUpload($request, $file);
            }
        }

		return redirect()->route('announcement.index');
    }

    public function show(Announcement $announcement)
    {
        return view('layout.announcement.show', ['announcement'=>$announcement]);
    }

    public function edit(Announcement $announcement)
    {
        return view('layout.announcement.edit', ['announcement'=>$announcement]);
    }

    public function update(Request $request, Announcement $announcement)
    {
        // dd(array_combine($announcement->descs, $request->Input('description')));
        $this->validate($request, [
            'title'=>'required',
			'description'=>'required|max:5000'
		]);

		$this->uploadHandle($request,$announcement);

        $description_update_array = array();
        foreach($request->Input('description') as $description_update) {
            array_push($description_update_array, $description_update);
        }

        $i = 0;
        foreach($announcement->descs as $description) {
            $description->description = $description_update_array[$i];
            $description->save();
            $i = $i + 1;
        }

		return redirect('/announcement');
    }

    public function updatefile(Request $request, AnnFile $annFile)
    {
        // dd($annFile->announcement);
        if(Input::hasFile('file')) {
            $file = $request->file('file');
            $this->fileUpload($request, $file, $annFile);
        }
        return redirect('/announcement');
    }

    public function destroy(Request $request, Announcement $announcement)
    {
        // dd($announcement->descs());
        $announcement->delete();
        $announcement->descs()->delete();

        if ($request->ajax()) {
            return response()->json($announcement);
        }
        return redirect()->route('announcement.index');
    }

    public function deleted()
    {
        $deleteds = Announcement::with('descs')->where(
                        function($query) {
                            $session = $this->session();
                            $query->where('username','=',$session)
                            ->whereNotNull('deleted_at');
                        })->withTrashed()->get();

		return view('layout.announcement.deleted', ['deleteds'=>$deleteds]);
    }

    public function restore($announcement)
    {
        Announcement::withTrashed()->find($announcement)->restore();

		return redirect()->route('announcement.index');
    }

    public function forcedelete(Request $request, $announcement)
    {
        Announcement::where('id', $announcement)->forcedelete();

        if ($request->ajax()) {
            return response()->json($announcement);
        }
		return redirect()->route('announcement.deleted.get');
    }
}
