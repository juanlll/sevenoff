@extends('layouts.app')
@section('main-contenido')
<br>
<br>
 <div class="container white center z-depth-5" 
 style="
 border-radius: 15px; 
 overflow:hidden; 
 padding-bottom: 0px;">
	<div class="row blue darken-3 z-depth-6" style="
	margin:0px;" >
        <h2 style="
        margin-bottom:0px; 
        margin-top:0px; 
        color: white;
        ">Notificaciones</h2>
        <p style="margin-top: 0px; 
        color: white;">Las notificaciones de Sevenoff son actualizaciones rápidas que te ayudan a monitorear lo que pasa en tu perfil. También puedes obtener notificaciones sobre la actividad de tus amigos y respecto a las solicitudes que recibas. Una notificación se muestra como un pequeño número rojo sobre el grupo correspondiente.</p>
    </div>
	<div class="row" 
	style="padding: 0px; 
	margin: 0px;">
		<div class="col m9 l9 s12 white ">
				 <div class="collection">
@foreach($notifications as $noti)
	        <a href="#!" class="collection-item">
	      	 <p>
	          <input type="checkbox" class="filled-in" id="f1" checked="checked" />
	          <label for="f1" style="color:black;">{{$noti->name}}</label>
	           <span class="right">{{$noti->created_at}}</span>
	    	 </p>
	        </a>
@endforeach

	        <a href="#!" class="collection-item">
	      	 <button href="" class="btn red">Eliminar</button>
	        </a>
      </div>
		</div>
		<div class="col m3 l3 s12 white">
		
      <ul class="collection with-header">
        <li class="collection-header"><h4>Información</h4></li>
       
        <li class="collection-item">
        <p><i class="material-icons" style="vertical-align: middle;">account</i>Nombre: 20/03/2018</p>
        <p><i class="material-icons" style="vertical-align: middle;">add</i>Fecha: 20/03/2018</p>
        <p><i class="material-icons" style="vertical-align: middle;">add</i>Estado: 20/03/2018</p>
		<p ><i class="material-icons" style="vertical-align: middle;">add</i><strong>Descripcion:</strong><br>
		 esto es una notoficiacion de prueba en donde lo unioco que se busca, es observar los cambios que se producen en las vistas de UI , con el fin de encontrar algo simetrico y minimalista a la hora de la gestin de las actividades.</p>
    </li>
       
      </ul>
            
		</div>
	</div>

	<div class="row blue darken-3 z-depth-6" style="margin:0px;" >
        
        <br>
        <button class="btn orange">Solicitar ayuda!</button>
        <br>
        <br>

    </div>
</div>

@endsection