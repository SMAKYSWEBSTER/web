<?php

namespace App\Http\Controllers;

use App\Album;
use App\Albumcover;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

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
        // dd($request->all());
        $photos = $request->file('photos');
		if(Input::hasFile('photos')) {
			foreach($photos as $photo) {
				$filename = $photo->getClientOriginalName();

				$album = new album;
				$album->photos = $filename;
				$album->album_id = $request->Input('id');
				$album->save();

                $location = public_path("albumosis/small/");
                $album_small = Image::make($photo);
                $album_small->fit(300,300);
                $album_small->save($location.$filename);

                $album_big = Image::make($photo);
                $width_ratio = round($album_big->width());
                $height_ratio = round($album_big->height());
                while ($width_ratio >= 10) {
                    if ($width_ratio % 2 == 1) {
                        $width_ratio = $width_ratio + 1;
                    }
                    if ($width_ratio % 2 == 0) {
                        $width_ratio = $width_ratio / 2;
                    }
                }
                while ($height_ratio >= 5) {
                    if ($height_ratio % 2 == 1) {
                        $height_ratio = $height_ratio + 1;
                    }
                    if ($height_ratio % 2 == 0) {
                        $height_ratio = $height_ratio / 2;
                    }
                }
                $album_big->resize($width_ratio*100, $height_ratio*100);
                $album_big->save('albumosis/big/'.$filename);
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

        if ($request->ajax()) {
            return response()->json($album);
        }
        return redirect()->route('album.show', ['album'=>$album_id]);
    }
}
