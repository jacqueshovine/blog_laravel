<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comments\CommentRequest;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CommentRequest $request, Article $article)
    {
        // var_dump($article);

        $comment = new Comment();

        // $article_id = $request->get('article_id');

        $comment->body = $request->get('body');
        $comment->author = $request->get('author');
        // $comment->article_id = $article->get('id');

        // $comment->save();
        $article->comments()->save($comment);

        // return redirect('/articles');
        // return view('articles.show', ['article' => Article::find($article_id)]);
        return view('articles.show', ['article' => $article]);
    }
}
