  @extends('layouts.app')


  @section('main-contenido')
  <br>
<br><br>
<br>
<div class="container white" id="voffers">


<div class="row">
  <div class="col s12 m12 l12">
     <view-offers></view-offers>
  </div>
</div>

</div>
<script src="{{asset('js/viewoffers.js')}}"></script>
  @endsection