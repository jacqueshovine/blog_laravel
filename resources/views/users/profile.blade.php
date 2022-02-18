@extends('layouts.root')

@section('body')

<main class="container">

    <div class="col text-start mt-4">
        <h1>My profile</h1>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <form method="POST" action="/user/{{ $user->id }}">
                @csrf
                @method('PUT')
                <input type="text" name="name" id="name" value="{{ $user->name }}"/>

                <input type="submit" class="btn btn-custom" value="Save name">
            </form>
        </div>
    </div>

    <div>
        <p>Joined : {{ $user->created_at; }}</p>
    </div>

</main>

@endsection
