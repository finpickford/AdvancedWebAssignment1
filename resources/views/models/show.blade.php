@extends('layout')

@section('content')
  <div class="heading">
  <h1> {{$model->model_name}} </h1>
  <h3>£{{$model->price}}</h3>
</div>

  <div class="content">

<ul>
Model number: {{$model->model_number}}
</uL>

<script type="text/javascript" src="/js/tabs.js"></script>

<div class="info">

<ul class="tab">
<li><a href="javascript:void(0)" class="tablinks" onclick="openTab(event, 'Details')" id="defaultOpen">Detials</a></li>
<li><a href="javascript:void(0)" class="tablinks" onclick="openTab(event, 'Specifications')">Specifications</a></li>
</ul>

<div id="Details" class="tabcontent">
  <h3>Details</h3>
<p>{{$model->details}}</p>
</div>

<div id="Specifications" class="tabcontent">
<h3> Specifications </h3>
 <p>
  Case size: {{$model->specifications->case_size}} <br>
  Dial colour: {{$model->specifications->dial_colour}} <br>
  Movement type: {{$model->specifications->movement_type}} <br>
  Case material: {{$model->specifications->case_material}}
 </p>
</div>
</div>

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
