@extends('layout')

@section('content')
  <div class="heading">
  <h1> {{$model->model_name}} </h1>
</div>

  <div class="content">
<ul>
<li>Model number: {{$model->model_number}}</li>
<br>
<li>Description: {{$model->details}}</li>
<br>
<li>Price: £{{$model->price}}</li>
</ul>

<form method="GET" action="/models/{{ $model->id }}/edit">
  <button type="submit">Edit model</button>
</form>
<br>

{{-- @foreach ($model->users as $user)
<a href="">Created by: {{ $user->name }}</a>
@endforeach --}}
</div>
@endsection
