@extends('layouts.root')

@section('body')

<p>Create article</p>

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

  <input class="btn btn-primary" type="submit"/>
</form>

@endsection