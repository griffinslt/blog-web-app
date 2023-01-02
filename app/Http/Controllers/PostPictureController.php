<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\PostPicture;
use App\Models\User;
use Illuminate\Http\Request;

class PostPictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user, Post $post)
    {
        return view('posts.post-picture-input', ['user'=>$user, 'post'=>$post]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        if (
            $post->user_id == auth()->user()->id or
                auth()
                ->user()
                ->roles->contains(
                    'role_name',
                    'admin' or
                        auth()
                        ->user()
                        ->roles->contains('role_name', 'post_moderator'),
                )
        ) {

            $validatedData = $request->validate([
                'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            ]);
            $image = $validatedData['image'];
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);

            $pp = new PostPicture;
            $pp->file_path = url('images/' . $imageName);
            $pp->post_id = $post->id;
            $pp->save();



            
            return redirect()->route('posts.post', ['post' => $post]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post, PostPicture $picture)
    {
        if (
            $post->user_id == auth()->user()->id or
                auth()
                ->user()
                ->roles->contains(
                    'role_name',
                    'admin' or
                        auth()
                        ->user()
                        ->roles->contains('role_name', 'post_moderator'),
                )
        ) {
            $picture->delete();
            return redirect()->route('posts.post', ['post' => $post->id]);

        }
    }
}
