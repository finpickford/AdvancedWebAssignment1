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

@if (Auth::guest())
@else

<form method="GET" action="/models/{{ $model->id }}/edit">
  <button type="submit">Edit model</button>
</form>
<br>

<form method="POST" action="/models/{{ $model->id }}/delete">

  {{ method_field('PATCH') }}
  {{ csrf_field() }}

  <button type="submit">Delete model</button>
</form>
<br>


<a href="/users/{{ $model->user_id }}">Added by: {{ $model->user->name }}</a>


@endif
</div>
@endsection
