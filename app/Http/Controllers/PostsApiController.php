<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsApiController extends Controller
{
    public function index()
    {
        return Post::all();
    }

    public function show($id)
    {
        return Post::get($id);
    }

    public function store()
    {
        request()->validate([
            'title' => 'required|min:3',
            'body' => 'required'
        ]);
        return Post::create([
            'title' => request('title'),
            'body' => request('body')
        ]);
    }

    public function update(Post $post)
    {
        request()->validate([
            'title' => 'required|min:3',
            'body' => 'required'
        ]);
    
        $success = $post->update([
            'title' => request('title'),
            'body' => request('body')
        ]);
    
        return [
            'success' => $success
        ];
    }

    public function destroy(Post $post)
    {
        $success = $post->delete();

        return [
            'success' => $success
        ];
    }
}
