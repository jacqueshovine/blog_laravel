<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\Comments\CommentRequest;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(CommentRequest $request, Article $article)
    {
        // Récupération du user connecté
        $user = Auth::User();

        $comment = new Comment();

        // $article_id = $request->get('article_id');

        $comment->body = $request->get('body');
        $comment->author = $user->name;
        // $comment->article_id = $article->get('id');

        // $comment->save();
        $article->comments()->save($comment);

        // return redirect('/articles');
        // return view('articles.show', ['article' => Article::find($article_id)]);
        return view('articles.show', ['article' => $article, 'article_body' => Helper::convertMarkdown($article->body)]);
    }
}
