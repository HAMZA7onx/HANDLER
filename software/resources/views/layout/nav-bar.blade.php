<nav class="navbar navbar-expand-lg bg-dark border-bottom border-bottom-dark ticky-top bg-body-tertiary"
     data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand fw-light" href="{{ route('dashboard') }}"><span class="fas fa-brain me-1"> </span>{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">

                @auth
                    @if(auth()->user()->is_admin)
                        <li class="nav-item">
                            <a class="{{ (Route::is('admin.dashboard')) ?'active' : '' }} nav-link" href="{{ route('admin.dashboard') }}"> Admin dashboard </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="nav-link active" aria-current="page">Logout</button>
                        </form>

                    </li>
                    <li class="nav-item">
                        <a class="{{ (Route::is('register')) ?'active' : '' }} nav-link" href="{{ route('profile', auth()->id()) }}"> {{ auth()->user()->name }} </a>
                    </li>
                @endauth
                @guest
                    <li class="nav-item">
                        <a class="{{ (Route::is('register')) ?'active' : '' }} nav-link" aria-current="page" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="{{ (Route::is('register')) ?'active' : '' }} nav-link" href="/register">Register</a>
                    </li>
                @endguest

            </ul>
        </div>
    </div>
</nav>
