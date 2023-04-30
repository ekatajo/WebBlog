@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
  <div class="col-lg-5 mt-5">
   
    {{-- Pemberitahuan --}}
    @if(session()->has('success'))
    <div class="alert alert-light alert-dismissible fade show" role="alert">
      {{  session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session()->has('failed'))
    <div class="alert alert-light alert-dismissible fade show" role="alert">
      {{  session('failed') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <main class="form-signin">
      <form action="/login" method="post">
        @csrf
        <h1 class="h3 mb-3 fw-normal text-center">Login</h1>
        
        {{-- Email --}}
        <div class="form-floating">
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
          <label for="email">Email</label>
          @error('email')
          <div class="invalid-feedback">
            {{  $message }}
          </div>
          @enderror
        </div>

        {{-- Password --}}
        <div class="form-floating">
          <input type="password" name="password" class="form-control" id="passwords" placeholder="Password">
          <label for="passwords" required>Password</label>
        </div>

        <button class="w-100 btn btn-lg btn-outline-primary" type="submit">Login</button>
        <p class="mt-3 mb-5 text-muted">&copy; Bismillah_</p>
      </form>
      <small class="d-block text-center">Belum bergabung? <a class="text-decoration-none" href="/register">Gabung sekarang!</a></small>
    </main>
  </div>
</div>
@endsection