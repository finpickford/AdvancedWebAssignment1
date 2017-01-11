@extends('layout')

@section('content')

<div class="heading">
  
      <h1>Welcome<h1>

  </div>

  <div class="content">
    Welcome to WristWatch. Below are some brands we feel are worth checking out, but feel free to search for others.

<div class="holder">
  <div class="rolex">
    		<a href="/watches/1" style="text-decoration:none; color:#fff;">
          <h1>
            Rolex
          </h1>
    			<img src="/images/Rolex.png" alt="SL"/>
    		</a>
    	</div>

  <div class="omega">
    <a href="/watches/2" style="text-decoration:none; color:#fff;">
      <h1>
        Omega
      </h1>
      <img src="/images/Omega.png" alt="SL"/>
    </a>
  </div>

  <div class="oris">
    <a href="/watches/3" style="text-decoration:none; color:#fff;">
      <h1>
        Oris
      </h1>
      <img src="/images/Oris.png" alt="SL"/>
    </a>
  </div>

  <div class="seiko">
    <a href="/watches/4" style="text-decoration:none; color:#fff;">
      <h1>
        Seiko
      </h1>
      <img src="/images/Seiko.png" alt="SL"/>
    </a>
  </div>

  <div class="nomos">
    <a href="/watches/5" style="text-decoration:none; color:#fff;">
      <h1>
        Nomos
      </h1>
      <img src="/images/Nomos.png" alt="SL"/>
    </a>
  </div>

  <div class="tudor">
    <a href="/watches/6" style="text-decoration:none; color:#fff;">
      <h1>
        Tudor
      </h1>
      <img src="/images/Tudor.png" alt="SL"/>
    </a>
  </div>
</div>
</div>



@endsection

@section('footer')

@stop
