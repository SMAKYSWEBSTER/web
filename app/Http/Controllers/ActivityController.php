<?php

namespace App\Http\Controllers;

use App\Albumcover;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ActivityController extends Controller
{
    private function handleUpload($request,$activity)
    {
        $album = $request->file('album');
		if(Input::hasFile('album')) {
            $albumname = $album->getClientOriginalName();
            $location = public_path("albumcover/");

            $activity_banner = Image::make($album);
            $activity_banner->fit(1350,260);
            $activity_banner->move($location.$albumname);

            $activity->cover = $albumname;
        }
        $activity->albumname = $request->Input('albumname');
		$activity->save();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albumcovers = Albumcover::latest()->get();

		return view('layout.activity.index', ['albumcovers'=>$albumcovers]);
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
            'albumname'=>'required|max:16',
            'album'=>'required|image',
		]);

        $activity = new Albumcover;
        $this->handleUpload($request,$activity);

        return redirect()->route('activity.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Albumcover $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Albumcover $activity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Albumcover $activity)
    {
        // dd($activity);
        $this->validate($request, [
            'albumname'=>'max:16',
            'album'=>'image',
		]);

        $this->handleUpload($request,$activity);

        return redirect()->route('activity.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Albumcover $activity)
    {
        // dd($albumcover);
        $activity->delete();

        return redirect()->route('activity.index');
    }
}
