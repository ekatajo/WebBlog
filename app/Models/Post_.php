<?php

namespace App\Models;

class Post 
{
   private static $blog_posts = [
        [ 
            "title"  => "Judul Postingan 1",
            "slug"   => "judul-postingan-pertama",
            "author" => "Bangwotss",
            "body"   => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium voluptates ut quos incidunt tempora optio dolore laudantium omnis harum aut ex perspiciatis minima nesciunt blanditiis vel, molestias corporis modi itaque beatae rem quam voluptatibus eligendi perferendis deleniti! Sapiente fugiat dicta dolorum, corrupti, voluptas ullam, magni libero sit rerum quod facilis!",
        ],
        [
            "title"  => "Judul Postingan 2",
            "slug"   => "judul-postingan-kedua",
            "author" => "Bangwotss",
            "body"   => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, temporibus. Fuga omnis recusandae ex in explicabo autem facere ab quibusdam. Magnam, doloribus a! Ipsum, consequatur!",
        ]
        ];  
        
    public static function all(){
        return collect(self::$blog_posts);
    }

    public static function find($slug){
        $posts = static::all();

    //         $post = [];
    // foreach($posts as $p){
    //     if($p["slug"] === $slug){
    //         $post = $p;
    //     }
    // }
    return $posts->firstWhere('slug', $slug); 

    }
}
