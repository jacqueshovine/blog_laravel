@extends('layouts.root')

@section('body')

<a href="/articles/create">Create new article</a>

<h1>List</h1>

@foreach ($articles as $article)
    <p>{{ $article->id }} 
       {{ $article->title }} 
       <a href="/articles/{{ $article->id }}">Read</a>
    </p>
@endforeach

@endsection