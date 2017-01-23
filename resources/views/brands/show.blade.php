@extends('layout')

@section('content')

  <div class="heading"> {{-- Page heading. --}}
    <h1>
      {{$brand->brand}} {{-- Output watch instance brand name. --}}
    </h1>
  </div>

  <div class="content"> {{-- Page content. --}}
    @if (count($brand->brandModels) == 0)
      No models found.
    @elseif (count($brand->brandModels) >= 1)

      <ul>
        @foreach ($brand->brandModels as $brandModel) {{-- Reference the models function in the watch controller. --}}
          <li><a href="/brandModels/{{ $brandModel->id }}">{{ $brandModel->model_name }}</a></li> {{-- Model name hyperlink. --}}
        @endforeach
      </ul>
    @endif
  </div>


  @if (Auth::guest()) {{-- User authentication. --}}
  @else

    <div class="functions">
      <h3>Admin</h3>
      <div class="form">
        <form method="GET" action="/brand/{{$brand->id}}/addmodel"> {{-- Form to add a model. --}}
          <button type="submit">Add a new model</button>
        </form>

        @if (count($errors)) {{-- Look for form validation errors. --}}
          <ul>
            @foreach ($errors->all() as $error)
              <li>
                {{ $error }} {{-- Output this error in a list. --}}
              </li>
            @endforeach
          </ul>
        @endif

        <form method="POST" action="/brand/{{ $brand->id }}/delete"> {{-- Delete the brand. --}}
          {{ method_field('PATCH') }}
          {{ csrf_field() }}
          <button type="submit">Delete brand</button>
        </form>
      </div>
    </div>
  @endif
@endsection
