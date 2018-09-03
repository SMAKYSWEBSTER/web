<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contactus;
use Illuminate\Support\Facades\DB;

class ManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact_us = Contactus::latest()->get();

		return view('layout.manage.index', ['contact_us'=>$contact_us]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contactus $manage)
    {
		return view('layout.manage.show', ['manage'=>$manage]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contactus $manage)
    {
        // dd($manage);
        $manage->delete();

        return redirect()->route('manage.index');
    }

    public function readed()
    {
        $readeds = DB::table('contactus')->whereNotNull('deleted_at')->get();

		return view('layout.manage.readed', ['readeds'=>$readeds]);
    }

    public function restore($manage)
    {
		Contactus::withTrashed()->find($manage)->restore();

		return redirect()->route('manage.index');
    }

    public function forcedelete($manage)
    {
        Contactus::where('id', $manage)->forcedelete();

        return redirect()->route('manage.index');
    }
}