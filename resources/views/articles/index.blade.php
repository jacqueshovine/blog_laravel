@extends('layouts.root')

@section('body')

<main class="container">

    <div class="row">
        <div class="col text-start mt-4">
            <h1>My articles</h1>
        </div>
        <div class="col text-end mt-4">
            <a href="/articles/create" class="btn" style="background-color: coral; color:white;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                  </svg>
                  Create new article</a>
        </div>
    </div>

    @foreach ($articles as $article)
        @if ($loop->first)
            <div class="row">
        @endif
                <div class="card col mt-4 ms-4">
                    <div class="card-header">
                        <p class="fst-italic">{{ \Carbon\Carbon::parse($article->created_at)->format('d/m/Y') }}</p>
                    </div>
                    <img src="https://source.unsplash.com/random/1200x800" class="card-img-top">
                    <div class="card-body">
                        <h2 class="card-title">{{ $article->title }} </h2>
                        <a href="/articles/{{ $article->id }}" class="btn" style="background-color: coral; color:white;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                                <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                              </svg>
                              Read</a>
                    </div>
                </div>
        @if ($loop->iteration % 3 === 0)
            </div>
            <div class="row">
        @endif
    @endforeach

</main>

@endsection