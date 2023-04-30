@extends('layouts.main')

@section('container')
    <h1>Halaman About</h1>
   <div class="mt-3">
       <center><h3> {{ $name }} </h3>
                <p> {{ $email }}  </p>
                <img src="img/<?= $image ?>" alt="<?= $name ?>" width="275" class="img-thumbnail img-rounded">
    </center>
   </div>
@endsection