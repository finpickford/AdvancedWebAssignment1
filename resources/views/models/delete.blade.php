@extends('layout')

@section('content')
  @if (Auth::guest())
  @else
<div class="heading">
 <h1> {{ $model->model_name }} succesfully deleted! </h1>

</div>
@endif
@endsection
