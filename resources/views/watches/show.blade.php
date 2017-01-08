@extends('layout')

@section('content')

  <h1> {{$watch->brand}} </h1>
<ul>
@foreach ($watch->models as $model)

<li>
   {{ $model->model_name }}
</li>
@endforeach
</ul>


@endsection
