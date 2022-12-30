<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\ProfilePicture;
use App\Models\User;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        return view('image-form', ['user'=>$user]);
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
    public function store(Request $request, User $user)
    {

        $validatedData = $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);


        
        $image = $validatedData['image'];
        $imageName = time().'.'.$image->extension();
        $image->move( public_path('images'),$imageName);
        ProfilePicture::where('user_id', "=", $user->id)->first()->update(array('file_path' => url('images/'.$imageName)));
        $posts = Post::all();
        $profilePictures = ProfilePicture::all();
        $comments = Comment::all();
        return view('users.user', ['user' => $user, 'posts' => $posts, 'profilePictures' => $profilePictures, 'comments' => $comments]);
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
    public function destroy($id)
    {
        //
    }
}
