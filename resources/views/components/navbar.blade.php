<nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color: coral;">
    <div class="container">
        {{-- <a class="navbar-brand" href="/"></a> --}}

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/articles">Articles</a>
                </li>
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item"><a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a></li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
    
                                <a href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();" class="nav-link">
                                    {{ __('Log Out') }}
                                </a>
                            </form>    
                        </li>
                    @else
                        <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Log in</a></li>

                        @if (Route::has('register'))
                            <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                        @endif
                    @endauth
            @endif
            </ul>
        </div>
        <div class="navbar-text">
            @auth
                Welcome, <a data-toggle="tooltip" data-placement="bottom" title="See profile" 
                            href="/user/{{ auth()->user()->id }}">{{ auth()->user()->name; }}</a>
            @else
                Welcome, guest
            @endauth
        </div>
    </div>
</nav>