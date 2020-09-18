<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\PhotoComment;
use App\Photo;
use App\User;
use App\Pet;
use Auth;

class PhotoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $user_name = $request->user_name;
        $photos = [];
        if($user_name != '') {
            $users = User::where('name', $user_name)->get();
            foreach ($users as $user){
                $photos = $user->photos;
            }
            
        } else {
            $photos = Photo::latest()->get();
            $photos->load('user');
            
        }
        
        //pagination
        $photos = Photo::paginate(10);

        return view('photos.index',compact('photos', 'pets', 'user_name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $photo = Photo::all();
        $pets = DB::table('pets')->where('user_id', Auth::id())->get();
        
        return view('photos.create',compact('photo','pets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Photo::$rules);
        
        $photo = new Photo;
        
        $form = $request->all();
        
        $path = $request->file('image')->store('public/image');
        $photo->image_path = basename($path);
        
        $photo->body = $request->body;
        $photo->user_id = Auth::id();
        
        unset($form['_token']);
        unset($form['image']);
        
        $photo->fill($form);
        $photo->user_id = Auth::id();
        $photo->save();
        
        return redirect()->route('photos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $photo = Photo::find($id);
        
        $photocomments = PhotoComment::where('photo_id', $id)->get();
        
        return view('photos.show', compact('photo', 'photocomments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $photo = Photo::find($id);

        if(Auth::id() !== $photo->user_id){
            return abort(404);
        }
        
        $photo_form = $request->all();
        unset($photo_form['_token']);
        
        $photo->fill($photo_form)->save();
        
        return view('photos.edit', ['photo_form'=>$photo]);
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
        $photo = Photo::find($id);

        if(Auth::id() !== $photo->user_id){
            return abort(404);
        }
        
        $photo->body = $request->body;
        
        $photo->save();
        
        return view('photos.edit', compact('photo')); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = Photo::find($id);
        
        if(Auth::id() !== $photo->user_id) {
            return abort(404);
        }
        
        $photo->delete();
        
        return redirect()->route('photos.index');
    }
}
