@extends('layout')

@section('content')
  @if (Auth::guest())
  @else
<div class="heading">
 <h1> Add {{ $watch->brand }} model</h1>

</div>

<div class="content">
  <form method="POST" action="/watches/{{ $watch->id }}/models">

    {{ csrf_field() }}

  <textarea name="model_name" placeholder="Model name">{{ old('model_name') }}</textarea>
  <textarea name="model_number" placeholder="Model number">{{ old('model_number') }}</textarea>
  <textarea name="details" placeholder="Details">{{ old('details') }}</textarea>
  <textarea name="price" placeholder="Price">{{ old('price') }}</textarea>

  <textarea name="case_size" placeholder="Case size">{{ old('case_size') }}</textarea>
  <textarea name="dial_colour" placeholder="Dial colour">{{ old('dial_colour') }}</textarea>
  <textarea name="movement_type" placeholder="Movement type">{{ old('movement_type') }}</textarea>
  <textarea name="case_material" placeholder="Materail">{{ old('case_material') }}</textarea>

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
</div>
@endif

@endsection
