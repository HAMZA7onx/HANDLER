<div class="card mt-4">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                     src="{{ $idea->user->getImageURL() }}" alt="{{ $idea->user->name }} Avatar">
                <div>
                    <h5 class="card-title mb-0"><a
                            href="{{ route('users.show', $idea->user->id) }}"> {{ $idea->user->name }}
                        </a></h5>
                </div>
            </div>
            <div>
                {{--                @auth--}}
                @if(auth()->id() == $idea->user->id)
                    <form action="{{ route('ideas.destroy', $idea->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <a href="{{ route('ideas.show', $idea->id) }}">view</a>
                        <a class="mx-2" href="{{ route('ideas.edit', $idea->id) }}">edit</a>

                        <button class="btn btn-danger">
                            X
                        </button>
                    </form>
                @else
                    <a href="{{ route('ideas.show', $idea->id) }}">view</a>
                @endif
                {{--                @endauth--}}
            </div>
        </div>
    </div>
    <div class="card-body">
        <p class="fs-6 fw-light text-muted">
        @if($editing ?? null)
            <form action=" {{ route('ideas.update', $idea->id) }}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <textarea name="content" class="form-control" id="idea" rows="3"> {{ $idea->content }} </textarea>
                    <div class="text-danger">
                        @error('content')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <button type="submit">Update idea</button>
            </form>
            @else
                {{ $idea->content }}
            @endif

            </p>
            <div class="d-flex justify-content-between">
                @include('ideas.shared.like-button')
                <div>
                <span class="fs-6 fw-light text-muted">
                    <span class="fas fa-clock"> </span>
                    {{ $idea->created_at->diffForHumans() }}
                </span>
                </div>
            </div>
    </div>
    @include('ideas.shared.comments-box')
</div>
