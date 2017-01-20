@extends('layout')

@section('content')
  @if (Auth::guest())
  @else
    <div class="heading">
      <h1> Edit {{ $model->model_name }} </h1>
    </div>

    <div class="content">

      <div class="form">
      <form method="POST" action="/models/{{ $model->id }}/update">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <textarea name="model_name" placeholder="Model name">{{$model->model_name}}</textarea>
        <textarea name="model_number" placeholder="Model number">{{$model->model_number}}</textarea>
        <textarea name="details" placeholder="Details">{{$model->details}}</textarea>
        <textarea name="price" placeholder="Price">{{$model->price}}</textarea>

        <textarea name="case_size" placeholder="Case size">{{$model->specifications->case_size}}</textarea>
        <textarea name="dial_colour" placeholder="Dial colour">{{$model->specifications->dial_colour}}</textarea>
        <textarea name="movement_type" placeholder="Movement type">{{$model->specifications->movement_type}}</textarea>
        <textarea name="case_material" placeholder="Material">{{$model->specifications->case_material}}</textarea>
        <button type="submit">Update model</button>
      </form>

      @if (count($errors))
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
