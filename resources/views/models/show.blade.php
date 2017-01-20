@extends('layout')

@section('content')

  <div class="heading"> {{-- Page heading. --}}
    <h1> {{ $model->model_name }} </h1> {{-- Show model name. --}}
    <h3>£{{ $model->price }}</h3> {{-- Show model price. --}}
  </div>

  <div class="content"> {{-- Page content. --}}
    <ul>
      Model number: {{$model->model_number}} {{-- Show the model number. --}}
    </uL>

    <div class="info"> {{-- Models info. --}}
      <ul class="tab"> {{-- Tabs system for the info. --}}
        {{-- Create a tab system to go between details and specifications. --}}
        <li><a href="javascript:void(0)" class="tablinks" onclick="openTab(event, 'Details')" id="defaultOpen">Detials</a></li>
        <li><a href="javascript:void(0)" class="tablinks" onclick="openTab(event, 'Specifications')">Specifications</a></li>
      </ul>

      <div id="Details" class="tabcontent"> {{-- Details tab section. --}}
        <h3>Details</h3>
        <p>{{$model->details}}</p> {{-- Model details. --}}
      </div>

      <div id="Specifications" class="tabcontent"> {{-- Specifications tab section. --}}
        <h3> Specification </h3>
        <p>
          Case size: {{$model->specifications->case_size}} <br> {{-- Model case size. --}}
          Dial colour: {{$model->specifications->dial_colour}} <br> {{-- Model dial colour. --}}
          Movement type: {{$model->specifications->movement_type}} <br> {{-- Model movement type. --}}
          Case material: {{$model->specifications->case_material}} {{-- Model case material. --}}
        </p>
      </div>
      <br>
      <a href="/users/{{ $model->user_id }}">Added by: {{ $model->user->name }}</a> {{-- Model username as hyperlink. --}}
      </div>
      </div>
    </div>

    <script type="text/javascript" src="/js/tabs.js"></script> {{-- External tab script. --}}
</div>

    @if (Auth::guest()) {{-- User authentication. --}}

    @elseif (Auth::user()->id == $model->user->id)

      <div class="functions">
        <h3>Admin</h3>
        <div class="form">
      <form method="GET" action="/models/{{ $model->id }}/edit"> {{-- Create a form to edit the current model, passing through it's ID. --}}
        <button type="submit">Edit model</button>
      </form>
      <br>

      <form method="POST" action="/models/{{ $model->id }}/delete"> {{-- Create a form to delete the model, passing through the model ID. --}}
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <button type="submit">Delete model</button>
      </form>

    @else

      <div class="comments"> {{-- Comments section. --}}
      <h3>Comments</h3>
      <div class="form">
      @foreach ($comments as $com) {{-- Show each comment in the foreach. --}}
      <ul>
        <li>{{ $com->comment }} - {{ $com->user->name}}</li> {{-- Out put the comments username. --}}
      </ul>
      @endforeach

      <form method="POST" action="/models/{{ $model->id }}/comment"> {{-- Add a comment. --}}
      {{ csrf_field() }}
      <textarea name="comment" placeholder="Comment">{{ old('comment') }}</textarea>
      <button type="submit">Leave comment</button>
      </form>
      <br>
      </div>
      </div>
@endif

@endsection
