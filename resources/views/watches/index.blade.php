@extends('layout')

@section('content')

<div class="heading">

  <h1> All watch brands </h1>
</div>

<div class="content">
  @foreach ($watches as $watch)

<div>


<ul>
  <li><a href="/watches/{{ $watch->id }}">{{ $watch->brand }}</a></li>
</ul>


</div>



  @endforeach

  @if (Auth::guest())
  @else

  <h3>Add a new brand</h3>


  <form method="POST" action="/watches/brands">

    {{ csrf_field() }}

  <textarea name="brand" placeholder="Brand">{{ old('brand') }}</textarea>
  <button type="submit">Add brand</button>
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
@endif
</div>
@endsection
