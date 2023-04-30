@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Coffee .</h1>
  </div>

  @if(session()->has('success'))
  <div class="alert alert-dark" role="alert">
    {{ session('success') }}
  </div>
  @endif

  <center><h2><span data-feather="grid"></span></h2></center>
  <div class="table-responsive col-lg">
    <a href="/dashboard/posts/create" class="btn btn-light mb-3 mp-3">Membuat</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">TITLE</th>
          <th scope="col">CATEGORIES</th>
          <th scope="col">ACTION</th>
        </tr>
      </thead>
      <tbody>
          @foreach($posts as $post)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $post -> title }}</td>
          <td>{{ $post ->category-> name }}</td>
          <td><a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-dark"><span data-feather="square"></span></a></td>
          <td><a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a></td>
          <td><form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
           @method('delete')
           @csrf
           <button class="badge bg-danger border-0" onclick="return confirm('Yakin, Mau Move On?')"><span data-feather="x-square"></span></a></button>
          </form></td>
        </tr>
        @endforeach
      </tbody>
    </table>
    
@endsection