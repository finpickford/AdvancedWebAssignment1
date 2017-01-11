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
</div>

@endsection
