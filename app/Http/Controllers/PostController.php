<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Validation\Rule;
use Psy\Util\Str;

class PostController extends Controller
{
    public function index()
    {
        return view('post.index', [
            'posts' => Post::latest()
                ->filter(
                    request()
                        ->only(['search','category','author']))
                ->paginate(6)
                ->withQueryString(),
        ]);
    }

    public function show(Post $post)
    {
        return view('post.show', [
            'post' =>  $post,
        ]);
    }



}
