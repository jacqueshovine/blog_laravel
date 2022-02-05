<?php

namespace App\Http\Controllers;

use App\Http\Requests\LikeRequest;
use App\Models\Article;
use App\Models\Like;
use App\Models\User;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(LikeRequest $request, Article $article)
    {        
        $like = new Like();
        $user = User::find($request->get('user_id'));

        $like->user_id = $request->get('user_id');

        $article->likes()->save($like);
        $user->likes()->save($like);

        return view('articles.show', ['article' => $article]);
    }
}
