@extends('layout')

@section('content')
  @if (Auth::guest())
  @else
<div class="heading">
 <h1> {{ $brandModel->model_name }} succesfully deleted! </h1>

</div>
@endif
@endsection
