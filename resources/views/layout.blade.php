<!DOCTYPE html>
<html lang="en">
<head>

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>WristWatch</title>
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="/css/style.css">

</head>
<body>
  <div class="login"> {{-- Login form at the top of the page. --}}
    <div class="loginLinks">
      <ul>
        <!-- Authentication Links -->
        @if (Auth::guest()) {{--If the user is not logged in, show the below. --}}
          <li><a href="{{ url('/login') }}">Login</a></li>
          <li><a href="{{ url('/register') }}">Register</a></li>
        @else {{--If the user is logged in, show the below. --}}
          <li class="dropdown">
            <a href="/users/{{Auth::user()->id}}">{{ Auth::user()->name }}</a> {{-- Get the users name and post their id--}}

            <ul class="dropdown-menu">
              <li>
                <a href="{{ url('/logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                Logout
              </a>

              <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
            </li>
          </ul>
        </li>
      @endif
    </ul>
  </div>
</div>

<div class="header">
  <div class="logo"> {{-- Create a class for the logo and header. --}}
    <ul>
      <li><h1><a href=/>WristWatch</a></h1></li>

    </ul>
  </div>

  <div class="search"> {{-- Create a search bar for users to search for a watch brand. --}}
    <form method="POST" action="/brand/search">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="search" id="search" name="watchsearch" placeholder="Search for a brand">
      <button id="button" type="submit">Search</button>
    </form>
  </div>
</div>

<div class="nav"> {{-- Navigation bar. --}}

  <ul>
    <li><a href=/>Home</a></li>
    <li><a href=/brands>Brands</a></li>
    <li><a href=/about>About</a></li>
    <li><a href=/dashboard>Dashboard</a></li>
  </ul>

</div>

@yield('content')

</body>

@yield('footer')
{{-- <div class="footer">
Fin Pickford u1362372
</div> --}}

</html>

</body>

</html>
