@extends('layout')

@section('content')

  @foreach ($watch as $result)

  <div class="heading">
<h1>Search results for: "{{ $result->brand }}"</h1>
</div>

<div class="content">
<ul>
@foreach ($result->models as $model)

     <li><a href="/models/{{ $model->id }}">{{ $model->model_name }}</a></li>

@endforeach

</ul>

@endforeach

  {{-- <h3>Add a new model</h3>


  <form method="POST" action="/watches/{{ $result->id }}/models">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <textarea name="model_name" placeholder="Model Name"></textarea>
  <textarea name="model_number" placeholder="Model Number"></textarea>
  <textarea name="details" placeholder="Details"></textarea>
  <textarea name="price" placeholder="Price"></textarea>

  <button type="submit">Add model</button>

  </form> --}}
@endsection
