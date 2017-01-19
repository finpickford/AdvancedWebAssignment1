@extends('layout') {{-- Reference the layout template to be used. --}}

@section('content') {{-- Reference the content section in the layout template to be used. --}}
  <div class="heading"> {{-- Create a heading class for the page's heading. --}}
    <h1> {{$user->name}} </h1> {{-- For the user object, output the users name from the user table . --}}
  </div>

  <div class="content"> {{-- Create a content class for the page's content . --}}
    <ul>
      <img src="/images/profile.png" alt="Profile" style="height:200px; width:200px"/> {{-- Show a profile icon . --}}
      <br>
      Email: {{$user->email}} {{-- Output the user objects email address from the users table. --}}
      <br>
      Member since: {{$user->created_at}} {{-- Show the timestamp of when the user first registered. --}}
    </ul>
  </div>

  <div class="content"> {{-- Create a class for the page's comments. --}}
    <h3>Comments</h3>
    @foreach ($user->comments as $comment) {{-- Foreach comment assosiated with the current user, output as a new variable, comment. --}}
      <li>{{ $comment->comment }} - {{ $comment->models->model_name }}</li> {{-- Show the comment body as well as for which model the comment relates to. --}}
    @endforeach
  </div>

@endsection
