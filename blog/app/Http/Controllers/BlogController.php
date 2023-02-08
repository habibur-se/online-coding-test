<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index()
    {
        try {
            $userId = Auth::id();
            $blogs = Blog::with('comments')->latest()->get();
            return view('blogs.index', compact('blogs'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function store(Request $request)
    {
        try {
            $userId = Auth::id();
            $request['user_id'] = $userId;
            $blog = new Blog();
            $request['slug'] = Str::slug($request->title) . '-' . $userId;
            $blog->fill($request->all())->save();
            return redirect('/blogs')->with('success', 'Blog saved.');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
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
            return view('blogs.edit', compact('blog'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $blog = Blog::find($id);
            $request['slug'] = Str::slug($request->slug);
            $blog->fill($request->all())->update();
            return redirect('/blogs')->with('success', 'Blog updated.');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function destroy($id)
    {
        // try{
        try {
            $blog = Blog::findOrFail($id);
            $blog->delete();
            return redirect('/blogs')->with('success', 'Blog removed.');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }

    }
}