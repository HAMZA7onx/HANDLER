<h4> Share yours ideas </h4>
<form action="{{ route('ideas.store') }}" method="post">
    @csrf
    <div class="row">
        <div class="mb-3">
            <textarea name="content" class="form-control" id="idea" rows="3"></textarea>
            <div class="text-danger">
                @error('content')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="">
            <button type="submit" class="btn btn-dark"> Share </button>
        </div>
    </div>
</form>
