
<!-- Modal Trigger -->
<!--   <a class="waves-effect waves-light btn modal-trigger" href="#modal88">Modal</a> -->

<div id="modal_apariencia" class="modal modal-fixed-footer" style="border-radius: 15px; height: 80%;">
  <div class="modal-content" style="padding: 0px; margin: 0px;">
    <div class="row" style="padding: 0px; margin: 0px;">

      <div class="col s12 m12 l12 blue darken-3 z-depth-5" style="padding: 0px; margin: 0px;">
        <center><h5 style="color:white;">Cambiar color</h5></center>
      </div>
      <div class="col s12 m12 l12" style=" padding: 0px; margin: 0px;"> 
       <center style="padding-top: 2px;" >
         <photoshop-picker style="width: 100%;" v-model="colors" @change="setColor()"></photoshop-picker>
         <br>
         <button class="btn waves-blue green" @click="putColor()">Cuardar color</button>

       </center>
       <br>
     </div>

   <div class="col s12 m12 l12 blue darken-3 z-depth-5" style="padding: 0px; margin: 0px;">
        <center><h5 style="color:white;">Cambiar banner</h5></center>
      </div>
     <div class="col m12 l12 s12 ">
      
        <upload-image v1="true" :image_url="image_url"></upload-image> 

</div>
</div>

</div>
 <div class="modal-footer blue darken-3 z-depth-5">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat white-text">Cerrar</a>
    </div>
</div>




<div id="modal_upload" class="modal modal-fixed-footer" style="border-radius: 15px; height: 80%;">
  <div class="modal-content" >
    <upload-image v2="true" :image_url="image_url"></upload-image>
  </div>
  <div class="modal-footer blue darken-3 z-depth-5">
    <a href="#!"  class="modal-action modal-close waves-effect waves-green btn-flat white-text">Cancelar</a>
  </div>
</div>
