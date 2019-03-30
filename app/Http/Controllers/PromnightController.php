<?php

namespace App\Http\Controllers;

use App\Promnight;
use App\Vote;
use Illuminate\Http\Request;

class PromnightController extends Controller
{
    public function index()
    {
    	$males = Promnight::where('sex','male')->get();
    	$females = Promnight::where('sex','female')->get();

    	return view('layout.promnight.index', ['males'=>$males, 'females'=>$females]);
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

		return redirect()->route('promnight.index');
    }

    public function votemale(Request $request) {
    	$vote = new Vote;
    	$vote->promnight_id = $request->input('id');
    	$vote->sex = 'male';
    	$vote->save();

    	return redirect()->route('success');
    }

    public function votefemale(Request $request) {
    	$vote = new Vote;
    	$vote->promnight_id = $request->input('id');
    	$vote->sex = 'female';
    	$vote->save();

    	return redirect()->route('success');
    }

    public function admin() {
    	$promkings = Promnight::where('sex','male')->get();
    	$promqueens = Promnight::where('sex','female')->get();

    	return view('layout.promnight.admin', ['promkings'=>$promkings, 'promqueens'=>$promqueens]);
    }
}
