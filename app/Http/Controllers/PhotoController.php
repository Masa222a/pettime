<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use App\Pet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $photos = Photo::latest()->get();
        $pets = Pet::where('user_id', Auth::id());

        return view('photo.index', ['photos' => $photos]);
    }
    
    public function add()
    {
        
        $photo = Photo::all();
        $pets = DB::table('pets')->where('user_id', Auth::id())->get();
        
        return view('photo.create', ['pets' => $pets, 'photo' => $photo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, Photo::$rules);

        $photo = new Photo;

        $form = $request->all();
        
        $path = $request->file('image')->store('public/image');
        $photo->image_path = basename($path);
        
        unset($form['_token']);
        unset($form['image']);
        
        $photo->fill($form);
        $photo->user_id = Auth::id();
        $photo->save();
        
        return redirect('/photo');
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
     * @param  int  $id,
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $photo = Photo::find($id);

        return view('photo.show',['photo' => $photo]);
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
    public function destroy($id)
    {
        //
    }
}
