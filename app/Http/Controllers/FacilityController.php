<?php

namespace App\Http\Controllers;

use App\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class FacilityController extends Controller
{
    private function handleUpload($request,$facility)
    {
        $facility->desc = $request->Input('desc');

		$photo = Input::file('photo');
		if(Input::hasFile('photo')) {
            $photoname = $photo->getClientOriginalName();
            $location = public_path("fasilitas/");
            $photo->move($location, $photoname);
            $facility->photo = $photoname;
		}
		$facility->save();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facilities = Facility::all();

        return view('layout.facility.index', ['facilities'=>$facilities]);
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
        $this->validate($request, [
            'desc'=> 'required|max:100',
            'photo' => 'required|image',
		]);

        $facility = new Facility;
        $this->handleUpload($request,$facility);

		return redirect()->route('facility.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function show(Facility $facility)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function edit($facility)
    {
        $fasilitas = Facility::where(['id'=>$facility])->first();

		return view('layout.facility.edit', ['fasilitas'=>$fasilitas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facility $facility)
    {
        $this->validate($request, [
            'desc'=> 'required|max:100',
            'photo' => 'image',
		]);
        $this->handleUpload($request,$facility);

        return redirect()->route('facility.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facility $facility)
    {
        $facility->delete();

        return redirect()->route('facility.index');
    }
}
