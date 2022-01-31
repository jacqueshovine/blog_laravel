@extends('layouts.root')

@section('body')

<h1>{{ $article->title }}</h1>

<p>{{ $article->body }}</p>

<a href="{{ route('articles.index') }}">Back to list</a>

<a href="{{ route('articles.edit', ['article' => $article]) }}">Edit article</a>

<form method="POST" action="/articles/{{ $article->id }}">
  @csrf
  @method('DELETE')
  <input type="submit" value="Delete article"/>
</form>

@endsection