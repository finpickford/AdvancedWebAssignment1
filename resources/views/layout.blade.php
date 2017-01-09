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

      <div class="logo">
        <ul>
        <li><h1> WristWatch</h1></li>
         {{-- <li><div class="search"><form method="POST" action="/watches/search">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="search" name="watchsearch" placeholder="Search">
            <button type="submit">Search</button>
        </form></div></li>  --}}
      </ul>
      </div>

      <div class="nav">

        <ul>
        <li><a href=/>Home</a></li>
          <li><a href=/watches>Brands</a></li>
          <li><a href=/about>About</a></li>
          <li><a href=/forum>Forum</a></li>
            </ul>

    </div>

      @yield('content')

    </body>

      @yield('footer')

</html>
