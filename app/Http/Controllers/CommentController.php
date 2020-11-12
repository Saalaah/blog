<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
class CommentController extends Controller
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
        $this->validate($request,['comment_body'=>'required',
        'post_id'=>'required',
        
        ]);
        $comment=new Comment;
        $comment->comment_body=$request->input('comment_body');
        $comment->user_id=auth()->user()->id;      
        $comment->post_id=$request->input('post_id');

        $comment->save();

        return response(["message"=>"comment added succefully"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      return  $comments=Comment::where('post_id',$id)->get();
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
        $this->validate($request,['comment_body'=>'required',
        
        ]);
       
        $comment=Comment::find($id);
        if($comment['user_id']==auth()->user()->id){

        $comment->comment_body=$request->input('comment_body');
        $comment->user_id=auth()->user()->id;      

        $comment->save();

        return response(["message"=>"comment edited succefully"]);}

        else {return response(['message'=>'Comment is not yours']);}

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment=Comment::find($id);
        if($comment['user_id']==auth()->user()->id){

            $comment->delete();
            return response(['message'=>"Comment deleted successfully"]);}
            else {return response(['message'=>'Comment is not yours']);}
    }
}
