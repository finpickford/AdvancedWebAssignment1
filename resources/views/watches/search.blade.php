@extends('layout')

@section('content')

  @foreach ($watch as $result)

  <div class="heading">
<h1>Search results for: "{{ $result->brand }}"</h1>
</div>

<div class="content">
<ul>
@foreach ($result->models as $model)
<li>
   {{ $model->model_name }}
</li>
@endforeach

</ul>

@endforeach

  <h3>Add a new model</h3>


  <form method="POST" action="/watches/{{ $result->id }}/models">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <textarea name="model_name">Model name</textarea>
  <textarea name="model_number">Model number</textarea>
  <textarea name="details">Details</textarea>
  <textarea name="price">Price</textarea>

  <button type="submit">Add model</button>

  </form>
@endsection
