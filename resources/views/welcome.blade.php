@extends('layout')

@section('content')

<div class="content">
    <h1>Welcome to WristWatch, a place to research wrist watches.<h1>

    <form method="POST" action="/watches/search">
      <h3>Search for a watch:</h3>
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="search" name="watchsearch">
        <button type="submit">Search</button>
    </form>
  </div>

              {{-- @unless (empty($watches))
                <p>There are some watches:</p>

              @else
                <p>There are no watches.</p>

              @endunless --}}



                {{-- @foreach ($watches as $watch)

                    <li> {{ $watch }} </li>

                @endforeach --}}

@endsection

@section('footer')

@stop
