@extends('layout')

@section('content')

  <h1> {{$watch->brand}} </h1>
  <hr>
<ul>
@foreach ($watch->models as $model)

<li>
   {{ $model->model_name }}
</li>
@endforeach
</ul>

<h3>Add a new model</h3>


<form method="POST" action="/watches/{{ $watch->id }}/models">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
<textarea name="model_name">Model name</textarea>
<textarea name="model_number">Model number</textarea>
<textarea name="details">Details</textarea>
<textarea name="price">Price</textarea>

<button type="submit">Add model</button>

</form>

@endsection
