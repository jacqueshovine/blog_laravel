<?php

namespace App\Http\Controllers;

use App\Http\Requests\LikeRequest;
use App\Models\Article;
use App\Models\Like;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;

class LikeController extends Controller
{
    public function store(LikeRequest $request, Article $article)
    {      
        
        $user = Auth::user();

        // Je stocke la requête dans une variable puis je l'exécute avec le get();
        $like = Like::query()
                    ->where('article_id', '=', $article->id)
                    ->where('user_id', '=', $user->id)
                    ->first();

        if($like === null)
        {
            $like = new Like();

            // J'associe un article au like, ce qui enregistre l'id de l'article dans la table like. 
            $like->article()->associate($article);
    
            // Idem
            $like->user()->associate($user);
    
            $like->save();
        }
        else
        {
            $like->delete();
        }

        return redirect()->route('articles.show', ['article' => $article]);
    }
}
