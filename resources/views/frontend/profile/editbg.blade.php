



  <!-- Modal Trigger -->
<!--   <a class="waves-effect waves-light btn modal-trigger" href="#modal_edit_bgxy">Modal</a> -->

  <!-- Modal Structure -->
  <div id="modal_edit_bgxy" class="modal bottom-sheet">
    <div class="modal-content">

     <div  class="row white" style="margin: 0px; border-style: dashed; ">
  
  <div class="col l6 m6 s12">
    <p class="range-field">
    <label> Vertical</label>
      <input type="range" id="test5" step="1" min="-1000" max="1000"  v-model="appearance.bgy"/>
       <input type="number" name="" v-model="appearance.bgy">
    </p>
  </div>
  <div class="col l6 m6 s12">
    <p class="range-field">
     <label> Horizontal</label>
      <input type="range" id="test5" step="1" min="-1000" max="1000"  v-model="appearance.bgx"/>
      <input type="number" name="" v-model="appearance.bgx">
    </p>
  </div>
  <div class="col l12 m12 s12">
    <center><button class="btn green" @click="putBgPosition()">Guardar</button></center>
  
  </div>
</div>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">CancelAR</a>
    </div>
  </div>