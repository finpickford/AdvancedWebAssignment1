@extends('layout')

@section('content')


              <h1>Welcome to WristWatch, a place to search and research wrist watches.<h1>

              <p>
              Use the search box below to search for a watch.
              </p>



<form method="POST" action="/watches/search">
  Search for a watch:
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
 <input type="search" name="watchsearch">

<button type="submit">Search</button>

</form>

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
