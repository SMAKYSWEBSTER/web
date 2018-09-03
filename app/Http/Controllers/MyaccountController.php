<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class MyaccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layout.myaccount.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function firstupdate(Request $request, User $myaccount)
    {
		$propic = Input::file('propic');
		$filename = $propic->getClientOriginalName();
		if(Input::hasFile('propic')) {
			$location = public_path("propic/");
            $propic->move($location, $filename);
            $myaccount->propic = $filename;
        }	
        $myaccount->save();

        return redirect()->route('myaccount.index');
    }
}
