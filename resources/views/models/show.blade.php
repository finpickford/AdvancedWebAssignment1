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

  <ul>
  <li>Case size: {{$model->specifications->case_size}}</li>
  <br>
  <li>Dial colour: {{$model->specifications->dial_colour}}</li>
  <br>
  <li>Movement type: {{$model->specifications->movement_type}}</li>
<br>
  <li>Case material: {{$model->specifications->case_material}}</li>
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

<div class="comments">
  <h3>Comments</h3>
@foreach ($comments as $com)
  <ul>
<li>{{ $com->comment }} - {{ $com->user->name}}</li>
</ul>
@endforeach

<form method="POST" action="/models/{{ $model->id }}/comment">

  {{ csrf_field() }}

<textarea name="comment" placeholder="Comment">{{ old('comment') }}</textarea>

<button type="submit">Leave comment</button>

</form>
<br>
</div>

@endsection
