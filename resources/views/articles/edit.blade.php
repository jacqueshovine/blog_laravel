@extends('layouts.root')

@section('body')

<main class="container">

    <h1>Updating article : {{ $article->title }}</h1>

    <!-- Appelle la méthode store -->
    <form method="POST" action="/articles/{{ $article->id }}">
    @csrf
    @method('PUT')
    <div class="btn-group mb-3" role="group" aria-label="Basic radio toggle button group">
        <input type="radio" class="btn-check" name="status" id="draft" value="draft" autocomplete="off"
            checked="{{ $article->status === 'draft' ? 'checked' : ''}}">
        <label class="btn btn-outline-custom" for="draft">Draft</label>
    
        <input type="radio" class="btn-check" name="status" id="published" value="published" autocomplete="off"
            checked="{{ $article->status === 'published' ? 'checked' : ''}}">
        <label class="btn btn-outline-custom" for="published">Publish</label>
    </div>
    
    <div class="row mb-3">
        <div class="col-sm-12 col-md-6">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ $article->title }}"/>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-sm-12 col-md-6">
            <label for="body">Body</label>
            <textarea name="body" id="body" rows="10" cols="100">{{ $article->body }}</textarea>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-sm-12 col-md-6">
            <input type="submit" class="btn btn-custom"/>
        </div>
    </div>
    </form>
</main>

@endsection
