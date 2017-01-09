@extends('layout')

@section('content')

<div class="content">
  <h1> All watches </h1>
  <hr>

  @foreach ($watches as $watch)

<div>


<ul>
  <li><a href="/watches/{{ $watch->id }}">{{ $watch->brand }}</a></li>
</ul>


</div>



  @endforeach

  <h3>Add a new brand</h3>


  <form method="POST" action="/watches/brands">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <textarea name="brand"></textarea>

  <button type="submit">Add brand</button>

  </form>
</div>
@endsection
