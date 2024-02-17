<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostsController extends Controller
{

    function index()
    {
        $Posts = Post::all();


        return view('posts/index', ['posts' => $Posts]);
    }
    function show(Post $post)
    {

        return view('posts/show', ['post' => $post]);
    }
    function create()
    {
        $users = User::all();

        return view('posts/create', ['users' =>  $users]);
    }
    function store()
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:5'],
            'post_creator' => ['required', 'exists:users,id']
        ]);

        $title = request()->title;
        $description = request()->description;
        $user_id = request()->post_creator;

        $post = new Post();
        $post->title = $title;
        $post->description = $description;
        $post->user_id = $user_id;

        $post->save();

        return to_route('posts.index');
    }
    function edit(Post $post)
    {

        $users = User::all();


        return view('posts/edit', ['users' => $users, 'post' => $post]);
    }

    function update($postId)
    {
        $title = request()->title;
        $description = request()->description;
        $posted_by = request()->post_creator;
        $post = Post::find($postId);
        request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:5'],
            'post_creator' => ['required', 'exists:users,id']
        ]);


        $post->update([
            'title' => $title,
            'description' => $description,
            'user_id' => $posted_by
        ]);


        return to_route('posts.show', $postId);
    }
    function destroy(Post $post)
    {
        $post->delete();
        return to_route('posts.index');
    }
}
