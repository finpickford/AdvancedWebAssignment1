@extends('layout') {{-- Reference the layout template. --}}

@section('content') {{-- Reference the content section within the layout template. --}}
  <div class="heading"> {{-- Create a heading class for the page's heading. --}}
    <h1> {{ $model->model_name }} </h1> {{-- Output the model objects model name from the model table.. --}}
    <h3>£{{ $model->price }}</h3> {{-- Output the model objects price from the model table. --}}
  </div>

  <div class="content"> {{-- Create a class for the page's content. --}}
    <ul>
      Model number: {{$model->model_number}} {{-- Output the model objects mobel number. --}}
    </uL>

    <script type="text/javascript" src="/js/tabs.js"></script> {{-- Reference a js script for a tabbed feature. --}}

    <div class="info"> {{-- Create a class for the info of the model. --}}
      <ul class="tab"> {{-- Create a class to hold the tabs. --}}
        {{-- Reference each section of the tabbed feature, and send it to a js function when clicked. --}}
        <li><a href="javascript:void(0)" class="tablinks" onclick="openTab(event, 'Details')" id="defaultOpen">Detials</a></li>
        <li><a href="javascript:void(0)" class="tablinks" onclick="openTab(event, 'Specifications')">Specifications</a></li>
      </ul>

      <div id="Details" class="tabcontent"> {{-- Create a div id for the details section of the tabs. --}}
        <h3>Details</h3>
        <p>{{$model->details}}</p> {{-- Output the model objects details from the model table. --}}
      </div>

      <div id="Specifications" class="tabcontent"> {{-- Create a div id for the models specfications section of the tabs. --}}
        <h3> Specification </h3>
        <p>
          Case size: {{$model->specifications->case_size}} <br> {{-- Output the models case size from the specifications table, by running the specifactions function in the models model. --}}
          Dial colour: {{$model->specifications->dial_colour}} <br> {{-- Output the models dial colour from the specifications table, by running the specifactions function in the models model. --}}
          Movement type: {{$model->specifications->movement_type}} <br> {{-- Output the models movement from the specifications table, by running the specifactions function in the models model. --}}
          Case material: {{$model->specifications->case_material}} {{-- Output the models material from the specifications table, by running the specifactions function in the models model. --}}
        </p>
      </div>
    </div>
</div>

    @if (Auth::guest()) {{-- If the user is not signed in, run the above. --}}
    @else {{-- If the user is signed in, run the below. --}}

      <div class="functions">
      <form method="GET" action="/models/{{ $model->id }}/edit"> {{-- Create a form to edit the current model, passing through it's ID. --}}
        <button id="button" type="submit">Edit model</button> {{-- Submit the form. --}}
      </form>
      <br>

      <form method="POST" action="/models/{{ $model->id }}/delete"> {{-- Create a form to delete the model, passing through the model ID. --}}
        {{ method_field('PATCH') }} {{-- Patch through the request to the database. --}}
        {{ csrf_field() }} {{-- Pass through a hidden token for toekn validation. --}}
        <button id="button" type="submit">Delete model</button> {{-- Submit the form . --}}
      </form>
      <br>

      <a href="/users/{{ $model->user_id }}">Added by: {{ $model->user->name }}</a> {{-- Show a hyperlink to the username assosiated with the model, and pass through the user ID. --}}
</div>


  <div class="comments"> {{-- Create a class for the comments section of the page. --}}
    <h3>Comments</h3>
    <div class="form">
    @foreach ($comments as $com) {{-- Foreach comment object, create a new variable as com. --}}
      <ul>
        <li>{{ $com->comment }} - {{ $com->user->name}}</li> {{-- Output each com object as the comment body and the username assosiated with it. --}}
      </ul>
    @endforeach

    <form method="POST" action="/models/{{ $model->id }}/comment"> {{-- Create a form to add a comment to the model. --}}
      {{ csrf_field() }} {{-- Pass through a hidden token for token validation. --}}
      <textarea name="comment" placeholder="Comment">{{ old('comment') }}</textarea>
      <button type="submit">Leave comment</button> {{-- Submit the form. --}}
    </form>
    <br>
  </div>
  </div>
@endif
@endsection
