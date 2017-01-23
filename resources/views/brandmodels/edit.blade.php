@extends('layout')

@section('content')
  @if (Auth::guest()) {{-- User authentication. --}}
  @else
    <div class="heading"> {{-- Page heading. --}}
      <h1> Edit {{ $brandModel->model_name }} </h1> {{-- Brand models model name. --}}
    </div>

    <div class="content"> {{-- Page content. --}}

      <div class="form"> {{-- Form section.--}}
        <form method="POST" action="/brandModels/{{ $brandModel->id }}/update"> {{-- A form to update the brand model. Passing through it's ID. --}}
          {{ method_field('PATCH') }}
          {{ csrf_field() }}
          <textarea name="model_name" placeholder="Model name">{{$brandModel->model_name}}</textarea> {{-- Model name. --}}
          <textarea name="model_number" placeholder="Model number">{{$brandModel->model_number}}</textarea> {{-- Model number. --}}
          <textarea name="details" placeholder="Details">{{$brandModel->details}}</textarea> {{-- Model details. --}}
          <textarea name="price" placeholder="Price">{{$brandModel->price}}</textarea> {{-- Model price. --}}

          <textarea name="case_size" placeholder="Case size">{{$brandModel->specifications->case_size}}</textarea> {{-- Model case size. --}}
          <textarea name="dial_colour" placeholder="Dial colour">{{$brandModel->specifications->dial_colour}}</textarea> {{-- Model dial colour. --}}
          <textarea name="movement_type" placeholder="Movement type">{{$brandModel->specifications->movement_type}}</textarea> {{-- Model movement type. --}}
          <textarea name="case_material" placeholder="Material">{{$brandModel->specifications->case_material}}</textarea> {{-- Movement case material. --}}
          <button type="submit">Update model</button>
        </form>

        @if (count($errors)) {{-- Error handling. --}}
          <ul>
            @foreach ($errors->all() as $error)
              <li>
                {{ $error}}
              </li>
            @endforeach
          </ul>
        @endif
      </div>


    </div>
  @endif

@endsection
