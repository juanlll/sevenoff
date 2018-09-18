<template>
    <ul class="collection" style="margin-top: 0px; margin-bottom: 0px;">
    <li class="collection-item grey lighten-3" style="font-weight: bold;">DATOS PERSONALES</li>
    <li class="collection-item center">
    <blockquote class="red lighten-4" style="border-color: red;">
   <p>
    <strong>Nombre:</strong> (Maximo 14 y Minimo 5 caracteres).<br>
    <strong>Correo electronico:</strong> (Maximo 14 y Minimo 5 caracteres). <br>
    <strong>Contraseña:</strong> Requiere haber ingresado la contraseña antigua.(Maximo 14 y Minimo 5 caracteres)
   </p>
  </blockquote>

   <div class="row">  
    <div class="col l3 hide-on-med-and-down"></div>
<div class="col l6 m12 s12">
<div class="input-field col l12 m12 s12">
<label>Nombre</label>
<input type="text" name="" v-model="user.name">
</div>

<div class="input-field col l12 m12 s12">
<label>Correo electronico</label>
<input type="email" name=""  v-model="user.email">
</div>

<div class="input-field col l12 m12 s12" >
<label>Nueva contraseña</label>
<input type="text" name="" placeholder="**************" v-model="user.password" class="validate" >
</div>
  <div class="input-field col s12 ">
         
      <label>Contraseña antigua</label>
   
      <input type="text" name="" placeholder="**************" v-model="oldp" required class="validate" data-length="10">
  <blockquote class="green lighten-4" style="border-color:green; padding:0px; margin:0px;">
    <strong>Guardar cambios:</strong> requiere verificar con la contraseña.
  </blockquote>
      </div>
    <div class="col l12 m12 s12 center">
      <br>
      <center ><button  class="waves-effect waves-light btn green" @click="putUser()" v-bind:class="{ 'disabled': showsave}">Guardar cambios</button></center>
      <br>
      </div>

</div>
   <div class="col l3 m12 s12 hide-on-med-and-down"></div>
</div> 
</li>
    
   <!--  <li class="collection-item grey lighten-3" style="font-weight: bold;">INFORMACIÓN EXTRA</li>
    <li class="collection-item center">
      <div class="row">
<div class="input-field col l6 m6 s12" >
<label>Fecha de nacimiento</label>
<input type="date" name="" placeholder="**************" v-model="user.birthdate" class="validate" >
</div>

<div class="input-field col l6 m6 s12" >
<label>Lugar de nacimiento</label>
<input type="text" name="" placeholder="neiva,huila" v-model="user.placebirth" class="validate" >
</div>


<div class="input-field col l6 m6 s12" >
<label>Direccion</label>
<input type="text" name="" placeholder="**************" v-model="user.address" class="validate" >
</div>


<div class="input-field col l6 m6 s12" >
<label>Telefono</label>
<input type="text" name="" placeholder="**************" v-model="user.phone" class="validate" >
</div>
</div>
    </li> -->

    <li class="collection-item grey lighten-3" style="font-weight: bold;">ULTIMA CONEXIÓN</li>
    <li class="collection-item center">
      <h4><strong>Fecha  y hora:</strong> {{user.connection}}</h4>
       <h4><strong>Direccion ip:</strong> {{user.ip}}</h4>
    </li>

 

   
</ul>

</template>

<script>

export default {
props:['user'],
name: 'EditUser',

data () {
  return {
	oldp: "",op1:false
  }
},
 methods:{
	putUser:function(){
    axios.put('/api/useru', {
      name:this.user.name,
      email:this.user.email,
      password:this.user.password,
      oldpassword:this.oldp
    }).then(function(response){
      toastr.success('Informacion guardada');
    }).catch(function (error) {
      toastr.error(''+error.response.data.oldpassword);
      console.log(error.response);
    });
    this.oldp = "";
    this.user.password = "";
       
  },
  getFormatDate:function(date){
  return moment(data).format('DD MM YYYY');
}
},
computed:{
  showsave: function () {

  return this.oldp == "";
}
}

}
</script>

<style lang="css" scoped>
</style>