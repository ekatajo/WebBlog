@extends('layouts.main')

@section('container')
    <h1 class="text-center mb-3">{{ $title }}</h1>

    {{-- Pencarian --}}
   <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="/blog">
                @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Apa yang kamu pikirkan?" name="search" value="{{ request('search') }}">
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                  </div>
            </form>
        </div>
    </div>
    
    {{-- Kondisi = Cek Postingan Tersedia --}}
    @if ($posts->count() > 0)
        <div class="card mb-3 mt-5">
           
            @if ($posts[0]->image)
            <div style="max-height: 350px; overflow: hidden;">
            <img src="{{ asset('storage/' . $posts[0]->image) }}" alt="{{ $posts[0]->category->name }}" >
            </div>
            @else
            <img src="https://source.unsplash.com/1200x500?{{ $posts[0]->category->name }}" alt="{{ $posts[0]->category->name }}">
            @endif
        
            <div class="card-body">
          <a href="/posts/{{ $posts[0]->slug }}" class="card-title text-decoration-none text-dark"><h3>{{ $posts[0]->title }}</h3></a>
          <p class="card-text"><a href="/blog?author={{  $posts[0]->author->username}}" class="text-decoration-none"> {{ $posts[0] ->author->name  }}</a> @ <small class="text-muted">{{ $posts[0]->created_at->diffForHumans() }}</small></p>
  <center><h5><a href="/blog?category={{ $posts[0]->category->slug }}" class="text-decoration-none card-text">{{ $posts[0] -> category -> name }}</a></h5>
          <p class="card-text">{{ $posts[0]->excerpt }}</p>
          
          <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Membaca</a></center> 
        </div>
    </div>

    {{-- Struktur Card Postingan  --}}
    <div class="container">
        <div class="row">
            @foreach($posts->skip(1) as $post)
            <div class="col-md-4 mt-3 mb-3">
                <div class="card">
                    <a href="/blog?category={{ $post->category->slug }}"><div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0,0,0,0.5)">{{ $post->category->name }}</div></a>
                    
                    @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="card-img-top">
                    @else
                    <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="card-img-top">
                    @endif

                    <div class="card-body">
                    <a href="/posts/{{ $post->slug }}" class="card-title text-decoration-none text-dark"><h5 class="card-title">{{ $post->title }}</h5></a>
                    <p class="card-text"><a href="/blog?author={{  $post->author->username}}" class="text-decoration-none"> {{ $post ->author->name  }}</a> @ <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small></p>
                    <p class="card-text">{{ $post->excerpt }}</p>
                    <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Membaca</a>
                    </div>

                </div>
          </div>
         @endforeach
     </div>
 </div>
    @else
    <p class="text-center text-muted fs-3 mt-5">Tidak Ditemukan | OOT</p>
    @endif

    {{-- Paginator --}}
    <div class="d-flex justify-content-end px-3">
    {{ $posts->links() }}
    </div>
@endsection
