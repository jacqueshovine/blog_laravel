@extends('layouts.root')

@section('body')

<main>

    <h1 class="text-center mt-4 mb-4">Welcome!</h1>

    <div>
        <p>This is the homepage of my project. There is no content for now.</p>
    </div>

    <div>
        A convenient link : <a href="https://laravel.com/docs/8.x">Laravel Documentation</a>
    </div>

    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0 fixed-bottom">
        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
    </div>
</main>

@endsection