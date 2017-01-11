@extends('layout')

@section('content')


  <div class="heading">
  <h1> {{$watch->brand}} </h1>
</div>

  <div class="content">
<ul>
@foreach ($watch->models as $model)

  <li><a href="/models/{{ $model->id }}">{{ $model->model_name }}</a></li>

@endforeach
</ul>

@if (Auth::guest())
@else

<h3>Add a new model</h3>


<form method="POST" action="/watches/{{ $watch->id }}/models">
  
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
<textarea name="model_name" placeholder="Model name">{{ old('model_name') }}</textarea>
<textarea name="model_number" placeholder="Model number">{{ old('model_number') }}</textarea>
<textarea name="details" placeholder="Details">{{ old('details') }}</textarea>
<textarea name="price" placeholder="Price">{{ old('price') }}</textarea>

<button type="submit">Add model</button>

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

<form method="POST" action="/watches/{{ $watch->id }}/delete">

{{ method_field('PATCH') }}
  <input type="hidden" name="_token" value="{{ csrf_token() }}">

<button type="submit">Delete brand</button>

</form>

@endif
</div>
@endsection
