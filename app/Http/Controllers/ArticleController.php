<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\Articles\StoreArticleRequest;
use App\Http\Requests\Articles\UpdateArticleRequest;
use App\Models\Article;
use League\CommonMark\CommonMarkConverter;
use PhpParser\Node\Expr\Cast\String_;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Article::all() renvoie une collection Laravel https://laravel.com/docs/8.x/collections
        return view('articles.index', ['articles' => Article::all()->sortByDesc('created_at')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Articles\StoreArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        //
        // dump($request);
        $article = new Article();

        // La propriété $fillable protège la création d'une instance d'article en authorisant que certaines propriétés définies.
        // Article::create($request->all());

        $article->title = $request->get('title');
        $article->body = $request->get('body');

        $article->save();

        // return redirect('/articles/' + $article->id);
        return redirect()->route('articles.show', ['article' => $article]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
        // $markdown_converter = new CommonMarkConverter();

        // $body_html = $markdown_converter->convert($article->body);

        return view('articles.show', ['article' => $article, 'article_body' => Helper::convertMarkdown($article->body)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
        return view('articles.edit', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Articles\UpdateArticleRequest  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        //
        $article->title = $request->get('title');
        $article->body = $request->get('body');

        $article->save();

        return redirect()->route('articles.show', ['article' => $article]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
        $article->delete();

        return redirect('/articles');
    }
}
