@extends('layouts.main')

@section('container')
    
    <h1 class="mb-5">Halaman Categories</h1>
    <div class="container">
        <div class="row">
            @foreach($categories as $category )
            <div class="col-md-4">
                <a href="/blog?category={{$category -> slug}}">
                <div class="card bg-light text-white">
                   <img src="https://source.unsplash.com/1200x750?{{ $category->name }}" class="card-img img-fluid img-thumbnail" alt="{{ $category->name }}">
                    <div class="card-img-overlay d-flex align-items-center p-2">
                      <h5 class="card-title text-center flex-fill" style="background-color: rgba(0,0,0,0.5)">{{ $category->name }}</h5>
                    </div>
                  </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>

@endsection
