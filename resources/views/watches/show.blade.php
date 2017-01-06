@extends('layout')

@section('content')

  <h1> {{$watch->brand}} </h1>
  <p> {{$watch->modelName}} </p>
<ul>
@foreach ($watch->details as $detail)

<li>
   {{ $detail->info}}
</li>
@endforeach
</ul>

<hr>

<h3> Add a new detail </h3>

<form method="POST" action="/watches/{{ $watch->id }}/details">

  <textarea name="info"></textarea>


<button type="submit">Add Detail</button>
</form>


@endsection
