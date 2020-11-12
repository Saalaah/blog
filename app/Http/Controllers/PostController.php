<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use App\User;

use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return Post::all();

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
        $this->validate($request,[
       'body'=>'required|string',
       ]);

       $post=new Post;
       $post->body=$request->input('body');
       $post->user_id=auth()->user()->id;      //user_id=auth()->user()->id;
       $post->save();
       return response(['message'=>'Post Created successfully']); 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     return   $post=Post::find($id);
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
        $this->validate($request,[
            'body'=>'required|string',
            ]);
            $post= Post::find($id);
            if($post['user_id']==auth()->user()->id){
            $post->body=$request->input('body');
            $post->save();
            return response(['message'=>'Post Edited successfully']); }
            else {return response(['message'=>'Post is not yours']);}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        if($post['user_id']==auth()->user()->id){
        $post->delete();
        return response(['message'=>"deleted successfully"]);}
        else {return response(['message'=>'Post is not yours']);}

    }

    public function userPosts($id){
      return   $posts=Post::where('user_id',$id)->get();

    }


}
