<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Menampilkan semua Data Postingan 

        return view('dashboard.posts.index', [
            'posts' => Post::where('user_id', auth()->user()->id) ->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Menampilkan Tambah Postingan 
        return view('dashboard.posts.create', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Menjalankan Fungsi Tambah
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug'  => 'required|unique:posts',
            'body' => 'required',
            'image' => 'image|file|max:10240',  //kilobyte
            'category_id' => 'required',
        ]);
        
        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-image');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request ->body), 250);

        Post::create($validatedData);

        return redirect('/dashboard/posts')->with('success', 'Berhasil Dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // Menjalankan Fungsi lihat Detail
        return view('dashboard.posts.show', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // Menampilkan update Data

        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all(),
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // Menjalankan Fungsi update Data
        $rules = [
            'title' => 'required|max:255',
            'image' => 'image|file|max:10240',  //kilobyte
            'body' => 'required',
            'category_id' => 'required',
        ];


        if($request->slug != $post->slug){
            $rules['slug'] = 'required|unique:posts';
        }

        $validatedData = $request->validate($rules);
        if($request->oldImage){
            Storage::delete($request->oldImage);
        }
        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-image');
        }
       
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request ->body), 250);

        Post::where('id', $post->id) -> update($validatedData);

        return redirect('/dashboard/posts')->with('success', 'Berhasil Diupdate!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // Delete Postingan
        
        // Men-Delete Gambar (Database)
        if($post->image){
            Storage::delete($post->image);
        }
        
        Post::destroy($post -> id);

        return redirect('/dashboard/posts')->with('success', 'Berhasil Dihapus!');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
