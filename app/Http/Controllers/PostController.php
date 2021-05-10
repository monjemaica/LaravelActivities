<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::where('title', '!=', '')->orderBy('created_at', 'desc')->get();
        $user = User::find(Auth::id());
        //call the posts function to get the relation for user_id
        $posts = $user->posts()->orderBy('created_at', 'desc')->get();
        $count = $user->posts()->where('title', '!=', '')->count();
        return view('posts.index', compact('posts', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'Title' => 'required|unique:posts|max:255',
            'Description' => 'required',
        ]);

        if ($request->hasFile('img')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('img')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('img')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            //Upload Image
            // $path = $request->file('image')->move(public_path('/residents'), $fileNameToStore);
            $path = $request->file('img')->storeAs('public/img', $fileNameToStore);
            // $path = $request->file('image')->move(base_path('public_html/residents'), $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.png';
        }

        $post->Title = $request->Title;
        $post->Description = $request->Description;
        $post->img = $fileNameToStore;
        //to store user_id
        $post->user_id = auth()->user()->id;

        if ($post->save()) {
            $message = "Successfully save";
        }

        return redirect('/posts')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post = Post::find($post->id);
        //select * from users where id = $id

        $comments = $post->comments;
        return view('posts.show', compact('post', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // $post = Post::find($id);
        $post->Title = $request->Title;
        $post->Description = $request->Description;
        $post->save();

        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // $post = Post::find($id);
        $post->delete();

        return redirect('/posts');
    }
}
