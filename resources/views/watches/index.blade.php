@extends('layout')

@section('content')

  <h1> All watches </h1>

  @foreach ($watches as $watch)

<div>
  {{$watches->brand}}
</div>

  @endforeach

@endsection
