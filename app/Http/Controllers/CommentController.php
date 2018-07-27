<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Notifications\RepliedToThread;
use App\Thread;
use App\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function addThreadComment(Request $request, Thread $thread)
    {
        $this->validate($request,[
            'body'=>'required'
        ]);

       $comment=new Comment();
       $comment->body=$request->body;
       $comment->user_id=auth()->user()->id;

       $thread->comments()->save($comment);

       $thread->user->notify(new RepliedToThread($thread));

       return back()->withMessage('comment created');
    }

    public function addReplyComment(Request $request, Comment $comment)
    {
        $this->validate($request,[
            'body'=>'required'
        ]);

       $reply=new Comment();
       $reply->body=$request->body;
       $reply->user_id=auth()->user()->id;

       $comment->comments()->save($reply);
       return back()->withMessage('Reply created');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
   
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        if($comment->user_id !== auth()->user()->id)
            return back()->withMessage('not authorized');

        $this->validate($request,[
            'body'=>'required'
        ]);

        $comment->update($request->all());
        return back()->withMessage('Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        if($comment->user_id !== auth()->user()->id)
            return back()->withMessage('not authorized');

        $comment->delete();
        return back()->withMessage('Deleted');
    }
}
