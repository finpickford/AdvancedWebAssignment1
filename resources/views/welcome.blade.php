@extends('layout') {{-- Reference the layout file which includes the sites HTML. --}}

@section('content') {{-- Reference the content section within the layout file, to make anything within this section follow its template. --}}

<div class="heading">
      <h1>Welcome<h1>
</div>

<div class="container">
    @include ('flash')
</div>

<div class="content">
    Welcome to WristWatch. A website built to allow you to search for watch brands and see their models, past and present. Click on 'Brands' in the navigation bar above, or use the search bar to search for a brand of your choosing.

  <div class="holder"> {{-- Create a div within the content div that shows some info. --}}

<br>

<script type="text/javascript" src="/js/fusioncharts.js"></script>

<script type="text/javascript" src="/js/fusioncharts.charts.js"></script>

<script type="text/javascript" src="js/jscharts.js"></script>

<div id="top-companies">A beautiful chart is on its way.</div>

  </div>
</div>

@endsection

@section('footer')

@stop
