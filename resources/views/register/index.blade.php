@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
  <div class="col-lg-5 mt-5">
    <main class="form-registration">
      <form action="/register" method="post">
        @csrf
        <h1 class="h3 mb-3 fw-normal text-center">Registration</h1>
        
        {{-- Nama --}}
        <div class="form-floating">
          <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="Nama" required value="{{ old('nama') }}">
          <label for="name">Nama</label>
          @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
       
        {{-- Username --}}
        <div class="form-floating">
          <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" required value="{{ old('username') }}">
          <label for="username">Username</label>
          @error('username')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
       
        {{-- Email --}}
        <div class="form-floating">
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
          <label for="email">Email</label>
          @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        {{-- Password --}}
        <div class="form-floating">
          <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
          <label for="password">Password</label>
          @error('password')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <button class="w-100 btn btn-lg btn-outline-primary mt-3" type="submit">Register</button>
        <p class="mt-3 mb-5 text-muted">&copy; Bismillah_</p>
      </form>
      <small class="d-block text-center">Sudah bergabung? <a class="text-decoration-none" href="/login">Gabung sekarang!</a></small>
    </main>
  </div>
</div>
@endsection