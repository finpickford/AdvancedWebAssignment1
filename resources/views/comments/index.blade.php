@extends('layout')

@section('content')

  <div class="heading"> {{-- Page heading. --}}
    <h1>Comments</h1>
  </div>

  <div class="content"> {{-- Page content. --}}
    @foreach ($comments as $comment) {{-- Output comments. --}}
      <div>
        <ul>
          <li><a href="/brandModels/{{ $comment->brandModels->id }}">{{ $comment->comment}} - {{ $comment->brandModels->model_name }} ({{ $comment->user->name }})</a></li>
        </ul>
      </div>
    @endforeach
  </div>

@endsection
