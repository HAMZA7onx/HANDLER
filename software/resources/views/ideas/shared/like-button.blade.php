<div>
    @auth
        @if(auth()->user()->do_likes($idea))
            <form action="{{ route('ideas.unlike', $idea->id) }}" method="post">
                @csrf
                <button type="submit" class="fw-light nav-link fs-6">
                    <span class="fas fa-heart me-1"></span>
                    {{ count($idea->likes) }}
                </button>
            </form>
        @else
            <form action="{{ route('ideas.like', $idea->id) }}" method="post">
                @csrf
                <button type="submit" class="fw-light nav-link fs-6">
                    <span class="far fa-heart me-1"></span>
                    {{ count($idea->likes) }}
                </button>
            </form>
        @endif
    @endauth

    @guest
        <form action="{{ route('ideas.like', $idea->id) }}" method="post">
            @csrf
            <button type="submit" class="fw-light nav-link fs-6">
                <span class="far fa-heart me-1"></span>
                {{ count($idea->likes) }}
            </button>
        </form>
    @endguest

</div>
