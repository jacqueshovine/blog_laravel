@extends('layouts.root')

@section('body')

<main class="container">
    
    <div class="mt-3">
        <img src="https://source.unsplash.com/random/900x500">
    </div>

    <div class="btn-toolbar" role="toolbar">
        <div class="mr-3 mt-3 mb-3" role="group">
            <a href="{{ route('articles.index') }}" class="btn text-center" style="background-color:coral; color:white;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                  </svg>
                  Back to list</a>
        </div>
        <div class="m-3" role="group">
            <a href="{{ route('articles.edit', ['article' => $article]) }}" class="btn" style="background-color:coral; color:white;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                </svg>
                Edit</a>
        </div>
        <div class="my-3" role="group">
            <form method="POST" action="/articles/{{ $article->id }}">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-danger" value='Delete'/>
            </form>
        </div>
    </div>

    <div id="author_banner" class="col-sm-12 col-md-12 col-lg-6 mt-3 p-1 border rounded bg-light">
        <div class="row">
            <div class="col-sm-2 mx-auto">
                <img width="48" height="48" src="" style="border-radius: 50%; background-color:coral;">
            </div>
            <div class="col-sm-6">
                <p>Name</p>
                <p class="fst-italic">{{ \Carbon\Carbon::parse($article->created_at)->format('d M Y') }}</p>
            </div>
            <div class="col-sm-4">
                Social
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <h1>{{ $article->title }}</h1>
    </div>

    <div class="row mt-3">
        <p>{{ $article->body }}</p>
    </div>


    <div class="row mt-3">
        <div class="col-sm-12 col-md-12 col-lg-6 border rounded">
            <form method="POST" action="/articles/{{ $article->id }}/comments" class="p-3">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="author">Nickname</label>
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

                <div class="col text-end mt-4">
                    <input type="submit" class="btn" style="background-color:coral; color;white" value="Post comment" />
                </div>   
            </form>
        </div>
    </div>

    <div class="row mt-3">
        <h2>Comments</h2>
    </div>

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

</main>

@endsection
