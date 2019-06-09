<?php

namespace App\Http\Controllers;

use App\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class AchievementController extends Controller
{
    private function handleUpload($request,$achievement)
    {
        $achievement->title = $request->Input('title');
        $achievement->name = $request->Input('name');
        $achievement->rank = $request->Input('rank');
        $achievement->date = $request->Input('date');
        $achievement->save();
    }

    private function validation($request)
    {
        $this->validate($request, [
			    'title' => 'required|max:100',
	            'date' => 'required',
		]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $achievements = Achievement::latest()->get();

        return view('layout.achievement.index', ['achievements'=>$achievements]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validation($request);

        $achievement = new Achievement;
        $photo = Input::file('photo');

		    if(Input::hasFile('photo')) {
            $photoname = $photo->getClientOriginalName();
            $location = public_path("achievements/");
            $photo->move($location, $photoname);
            $achievement->photo = $photoname;
		    } else {
            $achievement->photo = 'no-image.png';
        }

        $this->handleUpload($request,$achievement);

        return redirect()->route('achievement.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Achievement  $achievement
     * @return \Illuminate\Http\Response
     */
    public function show(Achievement $achievement) {}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Achievement  $achievement
     * @return \Illuminate\Http\Response
     */
    public function edit(Achievement $achievement)
    {
        // dd($achievement);

        return view('layout.achievement.edit', ['achievement'=>$achievement]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Achievement  $achievement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Achievement $achievement)
    {
        // dd($achievement);
        $this->validation($request);

        $photo = Input::file('photo');

        if(Input::hasFile('photo')) {
            $photoname = $photo->getClientOriginalName();
            $location = public_path("achievements/");
            $photo->move($location, $photoname);
            $achievement->photo = $photoname;
		    }
        $this->handleUpload($request,$achievement);

        return redirect()->route('achievement.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Achievement  $achievement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Achievement $achievement)
    {
        $achievement->delete();

        return redirect()->route('achievement.index');
    }
}
