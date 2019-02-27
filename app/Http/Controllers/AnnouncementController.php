<?php

namespace App\Http\Controllers;

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
        $announcement->description = $request->Input('description');
        $announcement->link = $request->Input('link');
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $session = $this->session();
        $users = User::where(['username'=>$session])->get();
        $selfs = Announcement::where(['username'=>$session])->latest()->get();
        $generals = Announcement::latest()->get();
        if (Announcement::withTrashed()->latest()->first() == true) {
            $ann_id = Announcement::withTrashed()->latest()->first()->id + 1;
        } else {
            $ann_id = null;
        }

		return view('layout.announcement.index', ['users'=>$users, 'generals'=>$generals, 'selfs'=>$selfs, 'ann_id'=>$ann_id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(Route::getCurrentRoute()->getName());
        $this->validate($request, [
			'description'=>'required|max:5000'
		]);
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
        return view('layout.announcement.show', ['announcement'=>$announcement]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement)
    {
        return view('layout.announcement.edit', ['announcement'=>$announcement]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Announcement $announcement)
    {
        $this->validate($request, [
			'description'=>'required|max:5000'
		]);
		$this->uploadHandle($request,$announcement);

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        $announcement->delete();

        return redirect()->route('announcement.index');
    }

    public function deleted()
    {
        $session = $this->session();
		$deleteds = DB::table('announcements')->where('username',$session)->whereNotNull('deleted_at')->get();
        // $files = AnnFile::where('announcement_id',$deleteds[20]->id)->get();
        // dd(AnnFile::where('announcement_id',$deleteds[20]->id)->get());

		return view('layout.announcement.deleted', ['deleteds'=>$deleteds]);
    }

    public function restore($announcement)
    {
        Announcement::withTrashed()->find($announcement)->restore();

		return redirect()->route('announcement.index');
    }

    public function forcedelete($announcement)
    {
        Announcement::where('id', $announcement)->forcedelete();

		return redirect()->route('announcement.deleted.get');
    }
}
