<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pet;
use App\Photo;
use App\Post;
use Carbon\Carbon;
use Auth;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pets = Auth::user()->pets;
        
        return view('pet.index', ['pets' => $pets]);
    }
    
    public function add()
    {
        return view('pet.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, Pet::$rules);
        
        $pet = new Pet;
        $form = $request->all();
        
        if(isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $pet->image_path = basename($path);
        } else {
            $pet->image_path = null;
        }
        
        unset($form['image']);
        
        $pet->fill($form);
        $pet->user_id = Auth::id();
        $pet->save();
        
        return redirect('/pet');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $pet = Pet::find($request->id);
        if (empty($pet)){
            abort(404);
        }
        return view('pet.edit', ['pet_form' => $pet]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, Pet::$rules);
        
        $pet = Pet::find($request->id);
        
        $pet_form = $request->all();
        unset($pet_form['_token']);
        
        $pet->fill($pet_form)->save();
        
        return redirect('/pet');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $pet = Pet::find($request->id);
        
        if(Auth::id() !== $pet->user_id){
            return abort(404);
        }
        $pet->delete();
        return redirect('/pet');
    }
    
}
