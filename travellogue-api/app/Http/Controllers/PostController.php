<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::where('user_id', "=", \Auth::user()->id()) ->get();
        // ログイン済みユーザーのゲット
        return response()->json($posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post = Post::create([
            'title' => $request->title,
            'prefecture' => $request->prefecture,
            'date' => $request->date,
            'place_name' => $request->place_name,
            'user_id' => \Auth::user()->id(),
            'content' => $request->content,
        ]);
        return response()->json($post);

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post = Post::find('id', '=', $post->id);
        $post->title = $request->title;
        $post->prefecture = $request->prefecture;
        $post->date = $request->date;
        $post->place_name = $request->place_name;
        $post->content = $request->content;
        return $post->save()
            ?response()->json($post)
            :response()->json([],500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        return $post->delete()
            ? response()->json($post)
            : response()->json([],500);
    }
}
