@extends('layout')

@section('content')
  @if (Auth::guest())
  @else
    <div class="heading">
      <h1> Edit {{ $model->model_name }} </h1>
    </div>

    <div class="content">

      <div class="form">
      <form method="POST" action="/models/{{ $model->id }}">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <textarea name="model_name" placeholder="Model name">{{$model->model_name}}</textarea>
        <textarea name="model_number" placeholder="Model number">{{$model->model_number}}</textarea>
        <textarea name="details" placeholder="Details">{{$model->details}}</textarea>
        <textarea name="price" placeholder="Price">{{$model->price}}</textarea>
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
