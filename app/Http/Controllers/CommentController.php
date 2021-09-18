<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;


class CommentController extends Controller
{
   
    public function store(Request $request, Post $post)
    {

        $data = $request->validate([
            'comment' => ''
        ]);
        $comment = new Comment();
        $comment->user_name = auth()->user()->name;
        $comment->post_id = $post->id;
        $comment->comment = $data['comment'];
        $comment->save();
        
        return back();


    }

}
