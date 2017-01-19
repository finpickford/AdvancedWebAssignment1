@extends('layout') {{-- Reference the layout template to be used. --}}

@section('content') {{-- Reference the content section within the layout template. --}}

  <div class="heading"> {{-- Create a heading class for the page's heading. --}}
    <h1> All watch brands </h1>
  </div>

  <div class="content"> {{-- Create a content class for the page's content. --}}
    @foreach ($watches as $watch) {{-- For each watches object, output this as a new variable named watch. --}}
      <div>
        <ul>
          <li><a href="/watches/{{ $watch->id }}">{{ $watch->brand }}</a></li> {{-- Display the watch brand as a hyperlink, and pass through the watch brands ID --}}
        </ul>
      </div>
    @endforeach
</div>

    @if (Auth::guest()) {{-- If the user is not signed in, run everything above this statement. --}}
    @else {{-- If the user is signed in, run everything below. --}}

      <div class="functions">
        <h3>Add a new brand</h3>
      <div class="form">
      <form method="POST" action="/watches/brands"> {{-- Create a form to be able to add a new watch brand. --}}
        {{ csrf_field() }} {{-- Add a hidden token for token validation. --}}
        <textarea name="brand" placeholder="Brand">{{ old('brand') }}</textarea>
        <button type="submit">Add brand</button> {{-- Submit the form. --}}
      </form>

      @if (count($errors)) {{-- Count the errors from the forms validation. --}}

        <ul>
          @foreach ($errors->all() as $error) {{-- Foreach error, output it as a new variable. --}}
            <li>
              {{ $error }} {{-- Display each error in a list item. --}}
            </li>
          @endforeach
        </ul>
      @endif
    @endif
  </div>
</div>

@endsection
