@extends('layout')

@section('content')

<div class="heading">
 <h1> Edit {{ $model->model_name }} </h1>

</div>

<div class="content">

<form method="POST" action="/models/{{ $model->id }}">

  {{ method_field('PATCH') }}

<input type="hidden" name="_token" value="{{ csrf_token() }}">
<textarea name="model_name" placeholder="Model name"></textarea>
<textarea name="model_number" placeholder="Model number"></textarea>
<textarea name="details" placeholder="Details"></textarea>
<textarea name="price" placeholder="Price"></textarea>

<button type="submit">Update model</button>

</form>

</div>

@endsection
