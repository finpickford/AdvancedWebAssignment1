@extends('layout') {{-- Reference the layout template to be used. --}}

@section('content') {{-- Reference the content section in the layout template to be used. --}}

  @foreach ($watch as $result) {{-- Foreach watch object which was searched for, output it as a result variable. --}}

    <div class="heading"> {{-- Create a heading class for the page's heading. --}}
      <h1>
        Search results for: "{{ $result->brand }}" {{-- Show the result objects brand name from the watch brand table.. --}}
      </h1>
    </div>

    <div class="content"> {{-- Create a content class for the page's content. --}}
      <ul>
        @foreach ($result->models as $model) {{-- Reference the models function relating to the result object, and output this as a new variable named model. --}}
          <li><a href="/models/{{ $model->id }}">{{ $model->model_name }}</a></li> {{-- Create a hyper link which displays the models name and passes through the models ID. --}}
        @endforeach
      </ul>
    @endforeach
    </div>

@endsection
