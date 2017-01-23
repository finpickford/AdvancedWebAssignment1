@extends('layout')

@section('content')
  @if (Auth::guest()) {{-- User authentication. --}}
  @else
    <div class="heading"> {{-- Page heading. --}}
      <h1> {{ $brandModel->model_name }} succesfully deleted! </h1> {{-- Show the user the models been deleted. --}}

    </div>
  @endif
@endsection
