<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogApiController extends Controller
{
    public function index()
    {
        // $userId = Auth::id();
        try {
            $blogs = Blog::with('comments')->latest()->get();

            return response()->json($blogs);

        } catch (\Exception $exception) {
            return response()->json($exception->getMessage());
        }

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        try {
            $request['user_id'] = Auth::id();
            $blog = new Blog();
            $blog->fill($request->all())->save();
            return response()->json($blog);
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage());
        }

    }


    public function show(Blog $blog)
    {
        //
    }

    public function edit($id)
    {
        try {
            $blog = Blog::findOrFail($id);
            return response()->json($blog);
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $blog = Blog::find($id);
            $blog->fill($request->all())->update();
            return response()->json($blog);
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $blog = Blog::findOrFail($id);
            $blog->delete();
            return response()->json($blog);
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage());
        }
    }
}