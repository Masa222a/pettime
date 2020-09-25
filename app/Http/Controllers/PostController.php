<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostComment;
use App\Post;
use App\User;
use Auth;

class PostController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_name = $request->user_name;
        $posts= [];
        if($user_name != '') {
            $users = User::where('name', $user_name)->get();
            foreach ($users as $user) {
                $posts = $user->posts;
                
            }
            
        } else {
            $posts = Post::latest()->get();
            $posts->load('user');
            
        }
        
        return view('posts.index',compact('posts', 'user_name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Post::$rules);
        
        $post = new Post;
        
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = Auth::id();

        $post->save();
        
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        
        $postcomments = PostComment::where('post_id', $id)->get();

        return view('posts.show', compact('post', 'postcomments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $post = Post::find($id);
        
        if(Auth::id() !== $post->user_id){
            return abort(404);
        }
        
        return view('posts.edit', ['post_form'=>$post]);
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
        $post = Post::find($id);
        $postcomments = PostComment::where('post_id', $id)->get();
        
        if(Auth::id() !== $post->user_id){
            return abort(404);
        }
        
        $post->title = $request->title;
        $post->body = $request->body;

        $post_form = $request->all();
        unset($post_form['_token']);

        $post->fill($post_form)->save();
        
        return view('posts.show', compact('post','postcomments'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        
        if(Auth::id() !== $post->user_id){
            return abort(404);
        }
        
        $post->delete();
        
        return redirect()->route('posts.index');
    }
}
