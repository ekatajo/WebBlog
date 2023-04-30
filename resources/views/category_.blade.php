@extends('layouts.main')

@section('container')
    <h1>Halaman Category</h1>
    <h3>_{{ $category }}</h3>

    @foreach($posts as $post)
    <article class="mb-5 mt-3">
        {{-- Notasi Objek = -> --}}
    <h2><a href="/posts/{{$post -> slug}}">{{ $post -> title }}</a></h2>
    <h5>{{ $post -> author }}</h5>
    <p>{{ $post -> excerpt }}</p>
    </article>
    @endforeach
@endsection
