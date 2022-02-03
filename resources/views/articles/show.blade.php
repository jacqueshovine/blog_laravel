@extends('layouts.root')

@section('body')

<h1>{{ $article->title }}</h1>

<p>{{ $article->body }}</p>

<p>Add new comment</p>

<form method="POST" action="/articles/{{ $article->id }}/comments">
    @csrf
    <div class="mb-3">
        <label class="form-label" for="author">Author</label>
        <input class="form-control" type="text" name="author" id="author"/>
    </div>
    
    <div class="mb-3">
        <label class="form-label" for="body">Comment</label>
        <textarea class="form-control" name="body" id="body"></textarea>
    </div>

    <!--
    Grâce au route model binding, pas besoin de passer l'id ici. Laravel injecte directement l'instance d'article dans ma route.
    https://laravel.com/docs/8.x/routing#route-model-binding
    <input type="hidden" value="{{ $article->id }}" name="article_id">
    -->

    <input type="submit" value="Post comment"/>
</form>

<h2>Comments</h2>

<!-- Pour avoir accès à la propriété comments, il faut avoir déclaré la relation hasMany dans le modèle Article. -->
@foreach ($article->comments as $comment)
    <figure>
        <blockquote class="blockquote">
          <p>{{ $comment->body }}</p>
        </blockquote>
        <figcaption class="blockquote-footer">
            {{ $comment->author }}
        </figcaption>
    </figure>
@endforeach

<a href="{{ route('articles.index') }}">Back to list</a>

<a href="{{ route('articles.edit', ['article' => $article]) }}">Edit article</a>

<form method="POST" action="/articles/{{ $article->id }}">
  @csrf
  @method('DELETE')
  <input type="submit" value="Delete article"/>
</form>

@endsection