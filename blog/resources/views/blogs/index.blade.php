@section('title', 'Home')
@extends('layouts.app')

@section('content')


    <div class="container">
        <h1 class="display-3">Blog Lists {{ Auth::user()->id }}</h1>
        <div>
            <a href="{{ route('blogs.create') }}" class="btn btn-primary mt-5 mb-5">Add New Blog</a>
        </div>
        @if (session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="row g-5 justify-content-center">
            @foreach ($blogs as $blog)
                <div class="col-lg-4 col-md-6">
                    <div style="" class="card w-100">
                        <div class="card-body">
                            <h4 class="card-title">{{ $blog->title }}</h4>
                            <p class="card-text">{{ $blog->description }}</p>
                        </div>
                        <hr>
                        <div>
                            <form method="post" action="{{ route('comments.store') }}">
                                @csrf
                                <div class="d-flex flex-row add-comment-section m-4 gap-2">
                                    <input type="hidden" name="blog_id" value="{{ $blog->id }}"
                                        class="form-control mr-3" placeholder="Add comment">
                                    <input type="text" value="{{ old('name') }}" name="name"
                                        class="form-control mr-3" placeholder="Add comment">
                                    <button class="btn btn-primary" type="submit">Comment</button>
                                </div>
                            </form>

                            @foreach ($blog->comments as $key => $comment)
                                <div class="m-4">
                                    <div class="d-flex flex-row justify-content-between align-items-center commented-user ">
                                        <div class="comment-text-sm">
                                            <span>{{ $comment->name }}</span>
                                        </div>


                                        @if (Auth::user()->id == $comment->user_id)
                                            <form action="{{ route('comments.destroy', $comment->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-outline-danger ms-1" type="submit">Del</button>

                                            </form>
                                        @endif


                                    </div>
                                </div>
                            @endforeach



                        </div>
                    </div>
                    @if (Auth::user()->id == $blog->user_id)
                        <div class="button" style="margin-top:10px">
                            <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-info">Edit</a>
                            <form action="{{ route('blogs.destroy', $blog->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>

@endsection
