@extends('layout')

@section('content')

  @foreach ($brand as $result) {{-- Output each watch instance. --}}

    <div class="heading"> {{-- Page heading. --}}
      <h1>
        Search results for: "{{ $result->brand }}" {{-- List of search results. --}}
      </h1>
    </div>

    <div class="content"> {{-- Page content. --}}
      <ul>
        @foreach ($result->brandModels as $brandModel) {{-- Show the searched brands models. --}}
          <li><a href="/brandModels/{{ $brandModel->id }}">{{ $brandModel->model_name }}</a></li>
        @endforeach
      </ul>
    @endforeach
    </div>

@endsection
