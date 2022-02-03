@extends('layouts.root')

@section('body')

<main class="container">

    <div class="col text-start mt-4">
        <h1>Create article</h1>
    </div>

    <!-- Appelle la méthode store -->
    <form method="POST" action="/articles">
    @csrf
    <div class="mb-3">
        <label class="form-label" for="title">Title</label>
        <input class="form-control" type="text" name="title" id="title"/>
    </div>

    <div class="mb-3">
        <label class="form-label" for="body">Body</label>
        <textarea class="form-control" name="body" id="body"></textarea>
    </div>

    <div>
        <a href="/articles" class="btn" style="background-color: coral; color:white;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
            </svg>
            Back to list</a>
        <input class="btn" type="submit" style="background-color: coral; color:white;"/>
    </div>

    @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    @error('body')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    </form>

</main>

@endsection
