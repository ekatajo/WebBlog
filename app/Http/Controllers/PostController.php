<?php

namespace App\Http\Controllers;

use illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $title= '';
        if(request('category')){ 
            $category = Category::firstWhere('slug', request('category'));
            $title = ' @ '.$category->name;
        }  
        if(request('author')){ 
            $author = User::firstWhere('username', request('author'));
            $title = ' @ ' .$author->name;
        }  
        return view('posts', [
            "active"    => "posts",
            "title"     => "Weblog" . $title,
            // "posts" => Post::all(),
            "posts"     => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString()
                            #with(['author','category'])->latest()->get(),
        ]);
    }

    // Rute Model Binding
    public function show(Post $post){
        return view('post', [
            "active"    => "posts",
            "title" => "Single Postingan",
            "post"  => $post,
        ]);
    }
}
