  @extends('layouts.app')


  @section('main-contenido')
  <br>
  <br>
  <style>
    #inputs{padding-right: 15px;}
    #main_fila{ padding-right: 20px; padding-left: 20px; }
  </style>
  <div id="vo" class="container white center z-depth-5" style=" border-radius: 15px; overflow:hidden; padding-bottom: 0px;">
  

    
    <div class="row blue darken-3 z-depth-5" style="margin:0px;" >
        <h1 style="margin-bottom:0px; margin-top:0px; color: white;">Editar oferta</h1>
        <p style="margin-top: 0px; color: white;">Realizá cambios y modificaciones a las ofertas.</p>
    </div>
  	<div class="row" id="main_fila" >

      
          <div class="col l6 m6 s12" >
      <offer-card :offer="offer" :color1="offer.color1" ></offer-card>
    </div>

  		<div class="col l6 m6 s12" >
  		
         <div class="row" >
          <div class="input-field col s12"  id="inputs" >
           <input id="name" type="text" v-model="offer.name" class="validate" required="" aria-required="true">
           <label for="name">Nombre</label>
         </div>

         <div class="input-field col s12"  id="inputs">
           <input id="discount" v-model="offer.discount" name="discount" type="number" class="validate" required="" aria-required="true">
           <label for="discount">Descuento</label>
         </div>

         <div class="input-field col s12"  id="inputs">
          <input id="price" name="price" v-model="offer.price" type="number" class="validate" required="" aria-required="true">
          <label for="price">Precio</label>
        </div>

        <div class="col s12" id="inputs">
          <label class="left" for="duedate">Fecha de vencimiento</label>
          <input id="duedate" name="duedate" v-model="offer.duedate" type="date" class="validate" required="" aria-required="true">
        </div>

        <div class="input-field col s12"  id="inputs">
          <input id="price" name="price" v-model="offer.price" type="text" class="validate" required="" aria-required="true">
          <label for="price">Precio</label>
        </div>

         <div class="input-field col s12">
          <textarea id="textarea1" v-model="offer.description" class="materialize-textarea"></textarea>
          <label for="textarea1">Descripción</label>
        </div>

        <div class="col l12 s12 m12">
          <label>Seleccinar imagen</label>
          <images-gallery ></images-gallery>
        </div>

      </div>


  </div>

</div>

<div class="row blue darken-3 z-depth-5" style="margin:0px;" >
  <br>
      <center><button class="btn  green waves-effect waves-light" @click="putOffer()">Guardar cambios</button></center>
      <br>
    </div>
    
</div>
@include('footer')
<script src="{{asset('js/viewoffer.js')}}"></script>

@endsection

