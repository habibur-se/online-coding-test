@section('title', 'Home')
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <h1 style="margin-bottom:30px" class="display-4">Create A New Blog</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif
                <form method="post" action="{{ route('blogs.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Title</label>
                        <input type="text" value="{{ old('title') }}" name="title" class="form-control"
                            id="exampleFormControlInput1" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Slug</label>
                        <input type="text" name="slug" value="{{ old('slug') }}" class="form-control"
                            id="exampleFormControlInput1" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description</label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{ old('description') }}</textarea>
                    </div>
                    <input style="margin-top:10px" class="btn btn-primary" type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>

@endsection
