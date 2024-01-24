@extends('layout.layout')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.left-sidebar')
        </div>
        <div class="col-6">
            @include('shared.success-message')
            <hr>
            <div class="mt-3">
            {{--    --}}
                <form action="{{ route('users.update', $user->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="card">
                        <div class="px-3 pt-4 pb-2">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                                         src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt="Mario Avatar">
                                    <div>
                                        <input value="{{ $user->name }}" name="name" type="text" class="form-group">
                                        <div class="text-danger">
                                            @error('bio')
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <a href="{{ route('users.show', auth()->id()) }}">view</a>
                                </div>
                            </div>
                            <div class="px-2 mt-4">
                                <h5 class="fs-5"> Bio : </h5>
                                <textarea value="{{ $user->biko }}" name="bio" type="text" class="fs-6 fw-light"></textarea>
                                <div class="text-danger">
                                    @error('bio')
                                    @enderror
                                </div>

                                <button type="submit">Update</button>

                                <div class="d-flex justify-content-start">
                                    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                                                    </span> 0 Followers </a>
                                    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                                                    </span> {{ count($user->ideas) }} </a>
                                    <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                                                    </span> {{ count($user->comments) }} </a>
                                </div>

                                @if(auth()->id() != $user->id)
                                    <div class="mt-3">
                                        <button class="btn btn-primary btn-sm"> Follow </button>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr>
                </form>

            {{--    --}}
            </div>
            @foreach($ideas as $idea)
                @include('shared.idea-card')
            @endforeach
            {{ $ideas->links() }}
        </div>

        <div class="col-3">
            @include('shared.search-bar')
            @include('shared.follow-box')
        </div>
    </div>

@endsection
