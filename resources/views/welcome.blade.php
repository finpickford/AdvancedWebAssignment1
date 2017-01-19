@extends('layout') {{-- Reference the layout file which includes the sites HTML. --}}

@section('content') {{-- Reference the content section within the layout file, to make anything within this section follow its template. --}}

  <div class="heading">
    <h1>Welcome<h1>
  </div>

  <div class="container"> {{-- Include a flash file to flash a session message to the page. --}}
    @include ('flash')
  </div>

  <div class="content"> {{-- Create a div class for the content of the page. --}}
    Welcome to WristWatch. A website built to allow you to search for watch brands and see their models, past and present. Click on 'Brands' in the navigation bar above, or use the search bar to search for a brand of your choosing.
  </div>

@endsection

@section('footer')

@stop
