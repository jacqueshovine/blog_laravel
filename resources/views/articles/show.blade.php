@extends('layouts.root')

@section('body')

<h1>{{ $article->title }}</h1>

<p>{{ $article->body }}</p>

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