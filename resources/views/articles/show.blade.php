@extends('layouts.root')

@section('body')

<main class="container">
    
    <div class="mt-3">
        <img src="https://www.placecage.com/200/300">
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
        <p>{!! $article_body !!}</p>
    </div>

    <div class="row">
        <form method="POST" action="/articles/{{ $article->id }}/likes">
            @csrf
            <div class="col text-start mt-4">
                <button type="submit" class="btn btn-outline" style="color:coral;border-color:coral;">
                    {{ $article->likes->count() }}
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
                        <path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111L8.864.046zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"/>
                      </svg>
                </button>
            </div> 
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
                    <input type="submit" class="btn" style="background-color:coral; color:white" value="Post comment" />
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
