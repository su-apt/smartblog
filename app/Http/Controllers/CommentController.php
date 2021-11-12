<?php

namespace App\Http\Controllers;

use App\Article;
use App\Notifications\comment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
        public function __construct()
    {

        $this->middleware('auth');

    }

    public function store(Request $request , Article $article)
    {


        $request->validate([
            'content' => 'required'
        ]);
        $request['user_id'] = Auth::user()->id;
        $article->comments()->create($request->all());

        Notification::send($article->user , new comment($request , $article));

        return redirect()->back();

    }
}
