@extends('layout')

@section('content')

      <div class="heading">
            <h1>Comments</h1>
      </div>
      <div class="content">
        @foreach ($comments as $comment)

      <div>


      <ul>
        <li><a href="/brandModels/{{ $comment->brandModels->id }}">{{ $comment->comment}} - {{ $comment->brandModels->model_name }} ({{ $comment->user->name }})</a></li>


      </ul>

      </div>

    @endforeach
    </div>

@endsection
