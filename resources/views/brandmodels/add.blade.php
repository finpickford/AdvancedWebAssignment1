@extends('layout')

@section('content')
  @if (Auth::guest()) {{--User authentication. --}}
  @else
    <div class="heading"> {{-- Page heading. --}}
      <h1> Add {{ $brand->brand }} model</h1> {{-- Brand name. --}}

    </div>

    <div class="content"> {{-- Page content. --}}
      <div class="form"> {{-- Forms on the page. --}}
        <form method="POST" action="/brand/{{ $brand->id }}/brandModels"> {{-- Post the brand ID. --}}

          {{ csrf_field() }}

          <textarea name="model_name" placeholder="Model name">{{ old('model_name') }}</textarea> {{-- Hold the old model name if the page refreshes. --}}
          <textarea name="model_number" placeholder="Model number">{{ old('model_number') }}</textarea> {{-- Hold the old model number if the page refreshes. --}}
          <textarea name="details" placeholder="Details">{{ old('details') }}</textarea> {{-- Hold the old details if the page refreshes. --}}
          <textarea name="price" placeholder="Price">{{ old('price') }}</textarea> {{-- Hold the old model price if the page refreshes. --}}

          <textarea name="case_size" placeholder="Case size">{{ old('case_size') }}</textarea> {{-- Hold the old case size if the page refreshes. --}}
          <textarea name="dial_colour" placeholder="Dial colour">{{ old('dial_colour') }}</textarea> {{-- Hold the old dial colour if the page refreshes. --}}
          <textarea name="movement_type" placeholder="Movement type">{{ old('movement_type') }}</textarea> {{-- Hold the old movement type if the page refreshes. --}}
          <textarea name="case_material" placeholder="Material">{{ old('case_material') }}</textarea> {{-- Hold the old case material if the page refreshes. --}}

          <button type="submit">Add model</button>
        </form>

        @if (count($errors)) {{-- Error handling. --}}

          <ul>
            @foreach ($errors->all() as $error)
              <li>
                {{ $error}}
              </li>
            </ul>
          @endforeach
        @endif
      </div>
    </div>
  @endif

@endsection
