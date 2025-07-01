<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'resumen' => 'required|string|max:500',
            'cuerpo' => 'required|string',
            'foto_post' => 'nullable|image|max:2048',
        ]);
    
        if ($request->hasFile('foto_post')) {
            $data['foto_post'] = $request->file('foto_post')->store('posts', 'public');
        }
    
        Post::create($data);
        return redirect()->route('posts.index')->with('success', 'Post creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'resumen' => 'required|string|max:500',
            'cuerpo' => 'required|string',
            'foto_post' => 'nullable|image|max:2048',
        ]);
    
        if ($request->hasFile('foto_post')) {
            if ($post->foto_post) {
                Storage::disk('public')->delete($post->foto_post);
            }
            $data['foto_post'] = $request->file('foto_post')->store('posts', 'public');
        }
    
        $post->update($data);
        return redirect()->route('posts.index')->with('success', 'Post actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if($post->foto_post){
            Storage::disk('public')->delete($post->foto_post);
        }

        $post->delete();
        return redirect()->route('post.index')->with('success', 'Post eliminado correctamente');
    }

    /**
     * Parte pública
     */

     public function indexPublic()
     {
        $post = Post::latest()->paginate(6);
        return view('blog.index', compact('posts'));
     }

     public function showPublic(Post $post)
     {
        return view('blog.show', compact('posts'));
     }
}
