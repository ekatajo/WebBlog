@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mb-3">
                <h3 class="mb-3">{{ $post->title }}</h3>
    <article>
    <h5><a href="/blog?author={{ $post->author->username }}" class="text-decoration-none">{{ $post -> author -> name }}</a></h5>
    <h5><a href="/blog?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post -> category -> name }}</a></h5>
    @if ($post->image)
                    <div style="max-height: 350px; overflow: hidden;">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid img-thumbnail img-rounded mb-3">
                    </div>
                    @else
                    <img src="https://source.unsplash.com/1200x500?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid img-thumbnail img-rounded mb-3">
    @endif
    <p>{!! $post -> body !!}</p>
    </article>

    <a href="/blog" class="text-decoration-none">Kembali</a>
            </div>  
        </div>
    </div>

@endsection