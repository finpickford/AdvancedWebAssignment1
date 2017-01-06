@extends('layout')

@section('content')


              <h1>Welcome to WristWatch, a place to search and research wrist watches.<h1>

              <p>
              Use the search box below to search for a watch.
              </p>

<form>
 Search for a watch:
 <input type="search" name="watchsearch">
 <input type="submit" value="Submit">
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
