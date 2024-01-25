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
                @include('shared.user-edit')
            </div>
            @foreach($ideas as $idea)
                @include('ideas.shared.idea-card')
            @endforeach
            {{ $ideas->links() }}
        </div>

        <div class="col-3">
            @include('shared.search-bar')
            @include('shared.follow-box')
        </div>
    </div>

@endsection
