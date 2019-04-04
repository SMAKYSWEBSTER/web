<?php

namespace App\Http\Controllers;

use App\Promnight;
use App\Vote;
use Illuminate\Http\Request;

class PromnightController extends Controller
{
    public function male()
    {
    	$males = Promnight::where('sex','male')->get();

    	return view('layout.promnight.male', ['males'=>$males]);
    }

    public function female()
    {
        $females = Promnight::where('sex','female')->get();

        return view('layout.promnight.female', ['females'=>$females]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=> 'required|max:100',
            'sex' => 'required'
		]);

        $promnight = new Promnight;
        $promnight->name = $request->Input('name');
        $promnight->sex = $request->Input('sex');
        $promnight->save();

		return redirect()->route('promnight.admin');
    }

    public function votemale(Request $request) {
    	$vote = new Vote;
    	$vote->promnight_id = $request->input('id');
    	$vote->sex = 'male';
    	$vote->save();

    	return redirect()->route('success.male');
    }

    public function votefemale(Request $request) {
    	$vote = new Vote;
    	$vote->promnight_id = $request->input('id');
    	$vote->sex = 'female';
    	$vote->save();

    	return redirect()->route('success.female');
    }

    public function admin() {
    	$promkings = Promnight::where('sex','male')->get();
    	$promqueens = Promnight::where('sex','female')->get();

    	return view('layout.promnight.admin', ['promkings'=>$promkings, 'promqueens'=>$promqueens]);
    }
}
