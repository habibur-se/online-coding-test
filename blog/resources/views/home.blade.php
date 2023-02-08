@section('title', 'Home')
@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row g-5 justify-content-center">
            @foreach ($blogs as $blog)
                <div class="col-lg-4 col-md-6">
                    <div style="" class="card w-100">
                        <div class="card-body">
                            <h4 class="card-title">{{ $blog->title }}</h4>
                            <p class="card-text">{{ $blog->description }}</p>
                        </div>
                        <hr>
                        <p class="ms-4">Comments:</p>
                        @foreach ($blog->comments as $key => $comment)
                            <div class="m-4">
                                <div class="d-flex flex-row justify-content-between align-items-center commented-user ">
                                    <div class="comment-text-sm">
                                        <span>{{ $comment->name }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            @endforeach
        </div>
    </div>
@endsection
