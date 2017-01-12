@extends('layout')

@section('content')

      <div class="heading">
            <h1>Comments</h1>
      </div>
      <div class="content">
        @foreach ($comments as $comment)

      <div>


      <ul>
        <li><a href="/models/{{ $comment->models->id }}">{{ $comment->comment}} - {{ $comment->models->model_name }} ({{ $comment->user->name }})</a></li>


      </ul>

      </div>

    @endforeach
    </div>

@endsection
