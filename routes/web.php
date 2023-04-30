<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\AdminCategoryController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Halaman Home
Route::get('/', function () {
    return view('home',[
        'active'=> 'home',
        'title' => 'Home'
    ]);
});

// Halaman About
Route::get('/about', function () {
    return view('about',[
        'active'=> 'about',
        'title' => 'About',
        "name"  => "Bangwotss",
        "email" => "Bangwotss@gmail.com",
        "image" => "Halal Pray.jpeg",
    ]);
});

// Halaman Postingan
Route::get('/blog', [PostController::class, 'index']);

// Halaman Single Postingan
Route::get('/posts/{post:slug}', [PostController::class, 'show']);
// Unique Identifier = ID (posts/{post})

// Halaman Kategori (Non-Aktif)
        // Route::get('/categories/{category:slug}', function(Category $category){
        //     return view('posts',[
        //     'active'=> 'categories',
        //     'title' => $category-> name ,
        //     'posts' => $category -> posts-> load('category','author'),
        //     ]);
        // });

// Halaman Sub-Kategori
Route::get('/categories', function(){
    return view('categories',[
        'active'=> 'categories',
        'title' => "Categories",
        'categories' => Category::all(),
        ]);
});

// Halaman Pengguna (Non-Aktif)
        // Route::get('/authors/{author:username}', function(User $author){
        //     return view('posts',[
        //         'active' => 'posts',
        //         'title' => $author->name,
        //         'posts' => $author -> posts ->load('category','author'),
        //         ]);
        // });

// Halaman Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Halaman Registrasi
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// Halaman Dashboard
Route::get('/dashboard', function(){
    return view ('dashboard.index'); })->middleware('auth');

// Halaman Dashboard Blog
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::get('/dashboard/post/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');

// Halaman Admin
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');
// Field Model User jangan diganggu nilai defaultnya.
