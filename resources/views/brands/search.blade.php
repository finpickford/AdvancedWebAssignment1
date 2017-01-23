@extends('layout')

@section('content')

  @if (count($brand) == 0)
    <div class="content">
      No matching brands found.
    </div>
  @elseif (count($brand) >= 1)

  @foreach ($brand as $result) {{-- Output each watch instance. --}}

    <div class="heading"> {{-- Page heading. --}}
      <h1>
        Search results for: "{{ $result->brand }}" {{-- List of search results. --}}
      </h1>
    </div>

    {{-- Page content. --}}
      <ul>
        @foreach ($result->brandModels as $brandModel) {{-- Show the searched brands models. --}}
          <div class="content">
          <li><a href="/brandModels/{{ $brandModel->id }}">{{ $brandModel->model_name }}</a></li>
        </div>
        @endforeach
      </ul>
@endforeach
@endif

@endsection
