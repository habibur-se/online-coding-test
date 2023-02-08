@section('title', 'Edit')
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <h1 style="margin-bottom:30px" class="display-4">Edit The Blog</h1>
                <form method="post" action="{{ route('blogs.update', $blog->id) }}">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Title</label>
                        <input type="text" name="title" value="{{ $blog->title }}" name="title" class="form-control"
                            id="exampleFormControlInput1" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Slug</label>
                        <input type="text" name="slug" value="{{ $blog->slug }}" class="form-control"
                            id="exampleFormControlInput1" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description</label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{ $blog->description }}</textarea>
                    </div>
                    <input style="margin-top:10px" class="btn btn-primary" type="submit" value="Update">
                </form>
            </div>
        </div>
    </div>

@endsection
