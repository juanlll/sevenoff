@extends('layouts.app')

@section('nav-breadcrumbs')
@endsection
@section('main-contenido')

<style type="text/css">
	#h{
		border-left-style: solid; border-width: 0.2px; border-color: #eeeeee ; 
		border-bottom-style: solid; border-width: 0.2px;
		color: #757575;
	}
	#ban{
		background-image: url('{{asset('img/bg.jpg')}}'); 
    background-position: 0px -700px;
		height: 300px; 
		/*background-position-y:-450px; */
		margin: 0px; 
		border-bottom-style: solid; 
		border-color: #40c4ff;
        border-top-style: solid; 
        /*padding: 200px;*/
        border-color: #40c4ff;
	}
	#ul1 li a{
color: #616161;
font-weight: bold;
	}
  
    i:hover{
      color:red;
    }

</style>

<div class="row" id="ban" >
	<center><h1 style="font-weight: bold; font-size: 50px; color:white;" >SevenOff.com</h1>
<button class="btn red" style="font-weight: bold;">Quiero ser anunciante</button>
  </center>
</div>

  <div class="row" id="contenedor" style="margin: 0px;">
      <ul class="tabs tabs-fixed-width" id="ul1">
        <li class="tab col s3">
          <a  class="active" href="#test1">
            <i class="material-icons" style="vertical-align: middle;">store</i>Tiendas</a>
        </li>
        <li class="tab col s3"><a  href="#test2">
         <i class="material-icons" style="vertical-align: middle;">local_offer</i>Ofertas</a>
         
        </li>
        <!-- <li class="tab col s3 disabled"><a  href="#test3">
          <i class="material-icons" style="vertical-align: middle;">map</i>Mapas</a>

        </li> -->
      </ul>
    <div id="test1" class="col s12" style="padding: 0px; margin: 0px;">
   
    	
<profiles-component :categories="categories"></profiles-component>

         
    </div>
<div id="test2" class="col s12">
<div class="row" style="padding: 50px;">

<h5 class="center" style="font-weight: bold;">Ofertas destacadas</h5>
<div class="row">
  <div class="col l3 m6 s12 " v-for="offer in offers">
     <offer-card   :offer="offer" :color1="offer.color1"></offer-card>
   </div>
</div>

   <h5 class="center" style="font-weight: bold;">Ultimas ofertas</h5>
   <div class="row " >
  
   <div class="col l3 m6 s12" v-for="offer in offers">
     <offer-card  :offer="offer" :color1="offer.color1"></offer-card>
   </div>
 </div>


</div>

</div>
    <div id="test3" class="col s12">
<!-- dassdasdasdasd -->
    </div>
  </div>
  @include('footer')
<script src="{{asset('js/viewstart.js')}}"></script> 
@endsection

