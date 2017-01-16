@extends('layout')

@section('content')
  {{-- <script type="text/javascript" src="/js/zingchart.min.js"></script> --}}
  <script src= "https://cdn.zingchart.com/zingchart.min.js"></script>
<script> zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9","ee6b7db5b51705a13dc2339db3edaf6d"];</script>


<div class="heading">

      <h1>Welcome<h1>

  </div>

  <div class="container">
    @include ('flash')
  </div>

  <div class="content">
    Welcome to WristWatch. Below are some brands we feel are worth checking out, but feel free to search for others.

<div class="holder">

<div id='myChart'></div>

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
