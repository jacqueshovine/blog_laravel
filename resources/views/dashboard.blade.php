@extends('layouts.root')

@section('body')

<main class="container">

    <div class="col text-start mt-4">
        <h1>My dashboard</h1>
    </div>

    <div class="col text-start mt-4">
        <h2>Articles</h2>
    </div>

    @if ($articles->count() !== 0)
        @foreach ($articles as $article)
            <div class="row">
                <div class="col-sm-12 hstack gap-3 mt-2">
                    <div>{{ $article->title }}</div>
                    <div class="ms-auto"><span class="fst-italic">{{ $article->created_at->format('d M Y') }}</span></div>
                    <div>{{ ucfirst($article->status) }}</div>
                    <div>
                        <a href="{{ route('articles.edit', ['article' => $article]) }}" class="btn btn-custom">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                            </svg>
                            Edit
                        </a>
                    </div>
                    <div>
                        <form method="POST" action="/articles/{{ $article->id }}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" value='Delete'/>
                        </form>
                    </div>
                </div>
            </div>
            <hr>
        @endforeach
    @else
        <div class="row">
            <div class="col-sm-12 hstack gap-3 mt-2">
                <p class="h3">No articles to display! </p>
                <div class="col text-end mt-4">
                    <a href="/articles/create" class="btn btn-custom">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                        </svg>
                        Create new article</a>
                </div>
            </div>
        </div>
    @endif

</main>

@endsection
