@extends('layout')

@section('content')

  <div class="heading"> {{-- User heading. --}}
    <h1> {{$user->name}} </h1> {{-- Show the user's name . --}}
  </div>

  <div class="content"> {{-- Page content. --}}
    <ul>
      <img src="/images/profile.png" alt="Profile" style="height:200px; width:200px"/> {{-- Profile icon. --}}
      <br>
      Email: {{$user->email}} {{-- User's email. --}}
      <br>
      Member since: {{$user->created_at}} {{-- Date user registered. --}}
    </ul>
  </div>

  <div class="comments"> {{-- Comments section for each user. --}}
    <h3>Comments</h3>
    @foreach ($user->comments as $comments) {{-- Foreach comment assosiated with the current user, output as a new variable, comment. --}}
      <li>{{ $comments->comment }} - {{ $comments->brandModel->model_name }}</li> {{-- Show the comment body as well as for which model the comment relates to. --}}
    @endforeach
  </div>

@endsection
