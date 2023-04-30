@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Posting Categories</h1>
  </div>

  @if(session()->has('success'))
  <div class="alert alert-dark" role="alert">
    {{ session('success') }}
  </div>
  @endif

  <center><h2><span data-feather="grid"></span></h2></center>
  <div class="table-responsive col-lg">
    <a href="/dashboard/categories/create" class="btn btn-light mb-3 mp-3">Membuat Kategori</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">NAME</th>
          <th scope="col">ACTION</th>
        </tr>
      </thead>
      <tbody>
          @foreach($categories as $category)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $category -> name }}</td>
          <td><a href="/dashboard/categories/{{ $category->slug }}" class="badge bg-dark"><span data-feather="square"></span></a></td>
          <td><a href="/dashboard/categories/{{ $category->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a></td>
          <td><form action="/dashboard/categories/{{ $category->slug }}" method="post" class="d-inline">
           @method('delete')
           @csrf
           <button class="badge bg-danger border-0" onclick="return confirm('Yakin, Mau Move On?')"><span data-feather="x-square"></span></a></button>
          </form></td>
        </tr>
        @endforeach
      </tbody>
    </table>
    
@endsection