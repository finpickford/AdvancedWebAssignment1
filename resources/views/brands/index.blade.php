@extends('layout')

@section('content')

  <div class="heading"> {{-- Page heading. --}}
    <h1> All watch brands </h1>
  </div>

  <div class="content"> {{-- Page content. --}}
    @foreach ($brands as $brand) {{-- Show each watch. --}}
      <div>
        <ul>
          <li><a href="/brand/{{ $brand->id }}">{{ $brand->brand }}</a></li> {{-- Watch brands hyperlink. --}}
        </ul>
      </div>
    @endforeach
  </div>

  @if (Auth::guest()) {{-- User authentication. --}}
  @else

    <div class="functions">
      <h3>Add a new brand</h3>
      <div class="form">
        <form method="POST" action="/brand/brands"> {{-- Add a new brand. --}}
          {{ csrf_field() }}
          <textarea name="brand" placeholder="Brand">{{ old('brand') }}</textarea>
          <button type="submit">Add brand</button>
        </form>

        @if (count($errors)) {{-- Count the form validation errors. --}}

          <ul>
            @foreach ($errors->all() as $error) {{-- Output each error. --}}
              <li>
                {{ $error }}
              </li>
            @endforeach
          </ul>
        @endif
      @endif
    </div>
  </div>

@endsection
