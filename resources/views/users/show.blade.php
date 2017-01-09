@extends('layout')

@section('content')
  <div class="heading">
  <h1> {{$user->name}} </h1>
</div>

  <div class="content">
<ul>
<img src="/images/profile.png" alt="Profile" style="height:200px; width:200px"/>
<br>
Email: {{$user->email}}
</ul>

{{-- <form method="GET" action="/models/{{ $model->id }}/edit">
  <button type="submit">Edit model</button>
</form> --}}
<br>

</div>
@endsection
