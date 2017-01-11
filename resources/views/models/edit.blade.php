@extends('layout')

@section('content')
  @if (Auth::guest())
  @else
<div class="heading">
 <h1> Edit {{ $model->model_name }} </h1>

</div>

<div class="content">
  <ul>
  <li>Model number: {{$model->model_number}}</li>
  <br>
  <li>Description: {{$model->details}}</li>
  <br>
  <li>Price: £{{$model->price}}</li>
  </ul>

<form method="POST" action="/models/{{ $model->id }}">

  {{ method_field('PATCH') }}
  {{ csrf_field() }}
  
<textarea name="model_name" placeholder="Model name">{{ old('model_name') }}</textarea>
<textarea name="model_number" placeholder="Model number">{{ old('model_number') }}</textarea>
<textarea name="details" placeholder="Details">{{ old('details') }}</textarea>
<textarea name="price" placeholder="Price">{{ old('price') }}</textarea>

<button type="submit">Update model</button>

</form>

@if (count($errors))

  <ul>
    @foreach ($errors->all() as $error)
      <li>
        {{ $error}}
      </li>
  </ul>
@endforeach
@endif

</div>
@endif

@endsection
