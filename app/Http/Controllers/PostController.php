<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(15) ;
        $users = User::all();
        return view('posts.index', ['posts' => $posts, 'users' => $users]);
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
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);


        $p = new Post;
        $p->title = $validatedData['title'];
        $p->body = $validatedData['body'];
        $p->user_id = Auth::user()->id;
        $p->save();

        $pid = Post::latest()->first()->id;


        session()->flash('message', 'Post Created');
        return redirect()->route('posts.post', ['post' => $pid]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $users = User::all();
        $comments = Comment::all();
        return view('posts.post', ['post' => $post, 'users' => $users, 'comments' => $comments ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edits.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'post_id' => 'required',
        ]);

        $p = Post::findOrFail($validatedData['post_id']);

        $p->title = $validatedData['title'];
        $p->body = $validatedData['body'];
        $p->save();

        $pid = Post::latest()->first()->id;


        session()->flash('message', 'Post Updated');
        return redirect()->route('posts.post', ['post' => $pid]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('message', 'post was Deleted.');
    }


    public function commentStore(Request $request)
    {
        $validatedData = $request->validate([
            'body' => 'required',
            'post_id' => 'required',
        ]);


        $c = new Comment();
        $c->body = $validatedData['body'];
        $c->user_id = Auth::user()->id;
        $c->post_id = $validatedData['post_id'];
        $c->save();

        session()->flash('message', 'Comment Created');
        return redirect()->back();
    }

    public function commentDestroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return redirect()->back();
    }
}
