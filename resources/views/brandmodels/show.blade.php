@extends('layout')

@section('content')

  <div class="heading"> {{-- Page heading. --}}
    <h1> {{$brandModel->brand->brand }} {{ $brandModel->model_name }} </h1> {{-- Show model name. --}}
    <h3>£{{ $brandModel->price }}</h3> {{-- Show model price. --}}
  </div>

  <div class="content"> {{-- Page content. --}}
    <ul>
      Model number: {{$brandModel->model_number}} {{-- Show the model number. --}}
    </uL>

    <div class="info"> {{-- Models info. --}}
      <ul class="tab"> {{-- Tabs system for the info. --}}
        {{-- Create a tab system to go between details and specifications. --}}
        <li><a href="javascript:void(0)" class="tablinks" onclick="openTab(event, 'Details')" id="defaultOpen">Details</a></li>
        <li><a href="javascript:void(0)" class="tablinks" onclick="openTab(event, 'Specifications')">Specifications</a></li>
      </ul>

      <div id="Details" class="tabcontent"> {{-- Details tab section. --}}
        <h3>Details</h3>
        <p>{{$brandModel->details}}</p> {{-- Model details. --}}
      </div>

      <div id="Specifications" class="tabcontent"> {{-- Specifications tab section. --}}
        <h3> Specification </h3>
        <p>
          Case size: {{$brandModel->specifications->case_size}} <br> {{-- Model case size. --}}
          Dial colour: {{$brandModel->specifications->dial_colour}} <br> {{-- Model dial colour. --}}
          Movement type: {{$brandModel->specifications->movement_type}} <br> {{-- Model movement type. --}}
          Case material: {{$brandModel->specifications->case_material}} {{-- Model case material. --}}
        </p>
      </div>
      <br>
      <a href="/users/{{ $brandModel->user_id }}">Added by: {{ $brandModel->user->name }}</a> {{-- Model username as hyperlink. --}}
    </div>
  </div>


<script type="text/javascript" src="/js/tabs.js"></script> {{-- External tab script. --}}


@if (Auth::guest()) {{-- User authentication. --}}
@elseif (Auth::user())
  @if (Auth::user()->id == $brandModel->user->id)
  <div class="functions">
    <h3>Admin</h3>
    <div class="form">
      <form method="GET" action="/brandModels/{{ $brandModel->id }}/edit"> {{-- Create a form to edit the current model, passing through it's ID. --}}
        <button type="submit">Edit model</button>
      </form>
      <br>

      <form method="POST" action="/brandModels/{{ $brandModel->id }}/delete"> {{-- Create a form to delete the model, passing through the model ID. --}}
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <button type="submit">Delete model</button>
      </form>
    </div>
  </div>
@endif

  <div class="comments"> {{-- Comments section. --}}
    <h3>Comments</h3>
    <div class="form">
      @foreach ($comments as $com) {{-- Show each comment in the foreach. --}}
        <ul>
          <li>{{ $com->comment }} - {{ $com->user->name}}</li> {{-- Out put the comments username. --}}
        </ul>
      @endforeach

      <form method="POST" action="/brandModels/{{ $brandModel->id }}/comment"> {{-- Add a comment. --}}
        {{ csrf_field() }}
        <textarea name="comment" placeholder="Comment">{{ old('comment') }}</textarea>
        <button type="submit">Leave comment</button>
      </form>
      <br>
    </div>

    @if (count($errors)) {{-- Error handling. --}}

      <ul>
        @foreach ($errors->all() as $error)
          <li>
            {{ $error}}
          </li>
        @endforeach
      </ul>
    @endif

  </div>
@endif

@endsection
