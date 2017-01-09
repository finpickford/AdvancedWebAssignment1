@extends('layout')

@section('content')

<div class="heading">
    <h1>Use the search box below to search for a brand.<h1>

    <form method="POST" action="/watches/search">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="search" name="watchsearch" placeholder="Search for a watch">
        <button type="submit">Search</button>
    </form>
  </div>

  <div class="rolex">

  </div>

  <div class="omega">

  </div>

  <div class="oris">

  </div>

  <div class="seiko">

  </div>

  <div class="nomos">

  </div>

  <div class="tudor">

  </div>



@endsection

@section('footer')

@stop
