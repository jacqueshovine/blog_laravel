@extends('layouts.root')

@section('body')

<p>Update article : {{ $article->id }}</p>

<!-- Appelle la méthode store -->
<form method="POST" action="/articles/{{ $article->id }}">
  @csrf
  @method('PUT')
  
  <label for="title">Title</label>
  <input type="text" name="title" id="title" value="{{ $article->title }}"/>

  <label for="body">Body</label>
  <textarea name="body" id="body">{{ $article->body }}</textarea>

  <input type="submit"/>
</form>

@endsection