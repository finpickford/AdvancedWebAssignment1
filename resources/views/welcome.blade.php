@extends('layout')

@section('content')

  <div class="heading">
    <h1>Welcome<h1>
  </div>

  <div class="container"> {{-- Include a flash file to flash a session message to the page. --}}
    @include ('flash')
  </div>

  <div class="content"> {{-- Page content. --}}
    Welcome to WristWatch. A website built to allow you to search for watch brands and see their models, past and present. Click on 'Brands' in the navigation bar above, or use the search bar to search for a brand of your choosing.
  </div>

@endsection

@section('footer')

@stop
