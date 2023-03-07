<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.post.index', [
            'posts' => Post::paginate(50)
        ]);
    }


    public function create()
    {
        return view('admin.post.create', ['categories' => Category::all()]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => ['required',Rule::unique('posts','title')],
            'thumbnail' => ['required','image'],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        $attributes['slug'] = \Illuminate\Support\Str::slug($attributes['title']);

        Post::create($attributes);

        return redirect('../')->with(['success' => 'Your post has been created']);
    }

    public function edit(Post $post)
    {
        return view('admin.post.edit', ['post' => $post, 'categories' => Category::all()]);
    }

    public function update(Post $post)
    {
        $attributes = request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        if (isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return back()->with('success', 'Post Updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Post Deleted!');
    }
}
