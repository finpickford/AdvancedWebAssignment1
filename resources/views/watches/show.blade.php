@extends('layout') {{-- Reference the layout template to be used. --}}

@section('content') {{-- Reference the content section from the layout template. --}}

  <div class="heading"> {{-- Create a div for the heading of the page. --}}
    <h1>
      {{$watch->brand}} {{-- For the heading, output the watch that was passed from the controller, and show its brand name from the brand colum. --}}
    </h1>
  </div>

  <div class="content"> {{-- Create a div for the content on the page. --}}
    <ul>
      @foreach ($watch->models as $model) {{-- Reference the models function in the watch controller, and make this result a new variable named model. --}}
        <li><a href="/models/{{ $model->id }}">{{ $model->model_name }}</a></li> {{-- Output the models name as a hyper link which passes through the models id. --}}
      @endforeach
    </ul>
    </div>

    @if (Auth::guest()) {{-- If the user is not signed in, show everything above this. --}}
    @else {{-- If the user is signed in, show all of the below, as extra content. --}}

      <div class="functions">
      <form method="GET" action="/watches/{{$watch->id}}/addmodel"> {{-- Create a form which passes through the current watch brands id, allowing the user to add a model to this brand. --}}
        <button id="button" type="submit">Add a new model</button> {{-- Create a button which submits the form. --}}
      </form>

      @if (count($errors)) {{-- If there are any errors from the forms validation, output these errors in a list to the user. --}}
        <ul>
          @foreach ($errors->all() as $error) {{-- For each error, create a new variable named error. --}}
            <li>
              {{ $error }} {{-- Output this error in a list. --}}
            </li>
          @endforeach
        </ul>
      @endif

      <form method="POST" action="/watches/{{ $watch->id }}/delete"> {{-- Add a form to be able to delete the current brand by it's ID. --}}
        {{ method_field('PATCH') }} {{-- Patch through the request to the database, in order to change the database. --}}
        {{ csrf_field() }} {{-- Add a hidden token for token validation. --}}
        <button id="button" type="submit">Delete brand</button> {{-- Submit the form. --}}
      </form>
    </div>
      @endif
@endsection
