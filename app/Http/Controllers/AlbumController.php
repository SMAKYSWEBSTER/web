<?php

namespace App\Http\Controllers;

use App\Album;
use App\Albumcover;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $photos = $request->file('photos');
		if(Input::hasFile('photos')) {
			foreach($photos as $photo) {
				$filename = $photo->getClientOriginalName();
				$location = public_path("albumosis/");
                $photo->move($location, $filename);

				$album = new album;
				$album->photos = $filename;
				$album->album_id = $request->Input('id');
				$album->save();
			}
		}

		$album_id = $request->Input('id');

		return redirect()->route('album.show', ['album'=>$album_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show($album)
    {
        // dd($album);
        $albumcovers = Albumcover::where(['id'=>$album])->get();
        $albums = Album::where(['album_id'=>$album])->get();
		$count = DB::table('album')->where('album_id',$album)->count();

		return view('layout.album.index', ['albumcovers'=>$albumcovers, 'albums'=>$albums, 'count'=>$count]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Album $album)
    {
        // dd($album);
        $album->delete();
        $album_id = $request->Input('album_id');

        return redirect()->route('album.show', ['album'=>$album_id]);
    }
}
