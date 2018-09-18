<div class="row">
      <h5>Datos personales</h5>
      <label>
        Los datos personales son toda aquella información que se relaciona con nuestra persona y que nos identifica o nos hace identificables. Nos dan identidad, nos describen y precisan:
      </label> 
      <button v-if="!op1" @click="op1=true" class="right" style="background-color: #f37f1f; border-style:solid; border-width: 1px; font-weight: bold; color: white;"><i class="material-icons tiny" style="vertical-align: middle;">mode_edit
</i>Modificar</button>
      <button v-if="op1" @click="op1=false" class="right" style="background-color:  #f37f1f; border-style:solid; border-width: 1px; font-weight: bold; color: white;">Contraer</button>
      <pre>@{{$data | json}}</pre>
    </div>

    <transition name="custom-classes-transition" enter-active-class="animated bounceIn"  leave-active-class="bounceOut">
      <div class="row" v-if="op1" style="border-radius: 15px; border-style:solid; border-width: 1px; border-color: #f37f1f;">
        <div class="col l3 m3 s12">
          <label>Nombre</label>
          <input type="text" name="" v-model="user.name">
        </div>

        <div class="col l3 m3 s12">
          <label>Correo electronico</label>
          <input type="email" name=""  v-model="user.email">
        </div>

        <div class="col l3 m3 s12">
          <label>Contraseña</label>
          <input type="text" name="" placeholder="**************">
        </div>

        <div class="col l3 m3 s12">
          <br>
        <center ><button  class="btn green" @click='alerta'>Guardar cambios</button></center>
        <br>
          </div>
      </div>  
    </transition>
