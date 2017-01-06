@extends('layout')

@section('content')

  <h1> All watches </h1>

  @foreach ($watches as $watch)

<div>


  <a href="/watches/{{ $watch->id }}">{{ $watch->modelName }}</a>


</div>

  @endforeach

@endsection
