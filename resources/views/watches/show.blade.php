@extends('layout')

@section('content')
  <div class="heading">
  <h1> {{$watch->brand}} </h1>
</div>

  <div class="content">
<ul>
@foreach ($watch->models as $model)

  <li><a href="/models/{{ $model->id }}">{{ $model->model_name }}</a></li>

@endforeach
</ul>

<h3>Add a new model</h3>


<form method="POST" action="/watches/{{ $watch->id }}/models">
  {{-- <input type="hidden" name="user_id" value="1"> --}}

  <input type="hidden" name="_token" value="{{ csrf_token() }}">
<textarea name="model_name" placeholder="Model name"></textarea>
<textarea name="model_number" placeholder="Model number"></textarea>
<textarea name="details" placeholder="Details"></textarea>
<textarea name="price" placeholder="Price"></textarea>

<button type="submit">Add model</button>

</form>
</div>
@endsection
