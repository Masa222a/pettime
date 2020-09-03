<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $auth = Auth::user();
        return view('user.index', [ 'auth' => $auth]);
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
    public function store() { 
      $user = new Users; 
      $user->username = $request->name; 
      $user->mail = $request->email; 
      $user->age = $request->age; 
      $user->created_user_name = $request->name; 
      
      $user->save(); }

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
        //User Modelからデータを取得
        $user = User::find($request->id);
        if (empty($user)) {
          abort(404);
        }
        return view('user.edit', ['user_form' => $user]);
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
        //Validationをかける
        $this->validate($request, User::$rules);
        
        //User Modelからデータを取得
        $user = User::find($request->id);
        
        //送信されてきたフォームデータを格納する
        $user_form = $request->all();
        unset($user_form['_token']);
        
        //該当するデータを上書きして保存する
        $user->fill($user_form)->save();
        
        return redirect('user');
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
    
    public function delete(Request $request)
    {
        $user = User::find($request->id);
        // $user->deleted_at = Carbon::now();
        return redirect('/login');
    }
}
