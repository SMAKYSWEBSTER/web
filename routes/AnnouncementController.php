<?php

namespace App\Http\Controllers;

use App\Announcement;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Auth;

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
		$file = Input::file('file');
		if(Input::hasFile('file')) {
            $filename = $file->getClientOriginalName();
            if(str_contains($file->getMimeType(), 'video')) {
                $location = public_path("video/");
            } else {
                $location = public_path("file/");
            }
            $file->move($location, $filename);
            $announcement->files = $filename;
		}
		$announcement->save();
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

		return view('layout.announcement.index', ['users'=>$users, 'generals'=>$generals, 'selfs'=>$selfs]);
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
        $this->validate($request, [
			'description'=>'required|max:5000'
		]);
		$announcement = new Announcement;
		$announcement->username = $request->Input('username');
		$announcement->propic = $request->Input('propic');
		$this->uploadHandle($request,$announcement);

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
        // dd($announcement->propic);
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
