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

@if (Auth::guest())
@else

<h3>Add a new model</h3>


<form method="GET" action="/watches/{{$watch->id}}/addmodel">


<button type="submit">Add a new model</button>
</form>

@if (count($errors))

  <ul>
    @foreach ($errors->all() as $error)
      <li>
        {{ $error}}
      </li>
  </ul>
@endforeach
@endif

<form method="POST" action="/watches/{{ $watch->id }}/delete">

{{ method_field('PATCH') }}
{{ csrf_field() }}

<button type="submit">Delete brand</button>
</form>

@endif
</div>
@endsection
