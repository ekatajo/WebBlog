@extends('dashboard.layouts.main')

@section('container')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg my-3">
                <div class="mb-3">
                <h3 class="mb-3">{{ $post->title }}</h3>
    <article>
            {{-- Posts = Single Postingan --}}
            <a href="/dashboard/posts" class="btn btn-light"><span data-feather="check-square"> </a>
            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-light"><span data-feather="edit"> </a>
                <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
           @method('delete')
           @csrf
           <button class="btn btn-light" onclick="return confirm('Yakin, Mau Move On?')"><span data-feather="x-square"></span></a>
          </form>
            </div>
    
    @if ($post->image)
    <div style="max-height: 350px; overflow: hidden;">
    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid img-thumbnail img-rounded mb-3">
    </div>
    @else
    <img src="https://source.unsplash.com/1200x500?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid img-thumbnail img-rounded mb-3">
    @endif
   
    <p>{!! $post -> body !!}</p>
    </article>

    <a href="/dashboard/posts" class="text-decoration-none">Kembali</a>
            </div>  
        </div>
    </div>
    
@endsection