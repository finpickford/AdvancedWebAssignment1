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
          <div class="login">
            <div class="loginLinks">
          <ul>
              <!-- Authentication Links -->
              @if (Auth::guest())
                  <li><a href="{{ url('/login') }}">Login</a></li>
                  <li><a href="{{ url('/register') }}">Register</a></li>
              @else
                  <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                          {{ Auth::user()->name }} <span class="caret"></span>
                      </a>

                      <ul class="dropdown-menu" role="menu">
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

          <div class="logo">
            <ul>
            <li><h1> WristWatch</h1></li>

          </ul>

          <div class="search">
              <form method="POST" action="/watches/search">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="search" name="watchsearch" placeholder="Search for a watch">
                  <button type="submit">Search</button>
              </form>
            </div>
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

</body>
</html>
