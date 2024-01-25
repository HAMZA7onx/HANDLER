<form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="card">
        <div class="px-3 pt-4 pb-2">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                         src="{{ $user->getImageURL() }}" alt="Mario Avatar">
                    <div>
                        <input value="{{ $user->name }}" name="name" type="text" class="form-group">
                        <div class="text-danger">
                            @error('image')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div>
                    <a href="{{ route('users.show', auth()->id()) }}">view</a>
                </div>
            </div>

            <div class="form-group mt-3">
                <label for="image" class="text-dark">Uploade image:</label><br>
                <input type="file" name="image" id="image" class="form-control">
                <div class="text-danger">
                    @error('image')
                    {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="px-2 mt-4">
                <h5 class="fs-5"> Bio : </h5>
                <textarea name="bio" type="text" class="fs-6 fw-light">{{ $user->bio }}</textarea>
                <div class="text-danger">
                    @error('image')
                    {{ $message }}
                    @enderror
                </div>

                <button type="submit">Update</button>

               @include('users.shared.user-stats')

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
