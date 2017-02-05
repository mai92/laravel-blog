<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts.index', [
            'posts' => $post->latestFirst()->get(),
        ]);
    }

    public function add()
    {
        return view('posts.create');
    }

    public function addPost(Request $request, Post $post)
    {
        $request->user()->posts()->create([
            'title' => $request->title,
            'content' => $request->content,
            'slug' => str_slug($request->title),
        ]);

        return redirect()->back()->with('success', 'Berhasil ditambahkan');
    }

    public function edit(Post $post)
    {
        $this->authorize('edit', $post);

        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    public function editPost(Request $request, Post $post)
    {
        $this->authorize('edit', $post);

        $post->title = $request->title ?? $post->title;
        $post->content = $request->content ?? $post->content;

        $post->save();

        return redirect()->back()->with('success', 'Post berhasil di Edit');
    }

    public function delete(Post $post)
    {
        $this->authorize('delete', $post);

        return view('posts.delete', [
            'post' => $post,
        ]);
    }

    public function deletePost(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return redirect()->route('posts')->with('danger', 'Post dihapus');
    }
}
