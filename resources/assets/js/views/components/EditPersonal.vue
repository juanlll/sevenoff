<template>
	    <ul class="collection" style="margin-top: 0px; margin-bottom: 0px;">
    <li class="collection-item grey lighten-3" style="font-weight: bold;">DATOS PERSONALES</li>
    <li class="collection-item center">
 

   <div class="row">  
    <div class="col l3 hide-on-med-and-down"></div>

<div class="col l6 m12 s12">

	<div class=" col l12 m12 s12">
	<label>Información completa</label>
	  <div class="progress">
      <div class="determinate" v-bind:style="{width: porcentaje}"></div>
  </div>
</div>

<div class="input-field col l6 m12 s12">
	<label>Primer nombre</label>
	<input type="text" name="" v-model="user_info.firstname">
</div>

<div class="input-field col l6 m12 s12">
	<label>Segundo nombre</label>
	<input type="text" name="" v-model="user_info.secondname">
</div>

<div class="input-field col l6 m12 s12" >
	<label>Primer apellido</label>
	<input type="text" name="" placeholder="Example:trujillo"  
	class="validate" v-model="user_info.surname">
</div>

  <div class="input-field col l6 m12 s12 ">
      <label>Segundo apellido</label>
      <input type="text" name="" required class="validate" data-length="10"
      v-model="user_info.secondsurname">
  </div>

  <div class="input-field col l6 m12 s12">
      <label>Lugar de nacimiento</label>
      <input type="text" name="" required class="validate" data-length="10" v-model="user_info.placebirth">
  </div>

   <div class="input-field col l6 m12 s12 ">
      <label>Fecha de nacimiento</label>
      <input type="date" name="" required class="validate" data-length="10" v-model="user_info.birthdate">
  </div>

   <div class="input-field col s12 ">
      <label>Telefono</label>
      <input type="number" name="" required class="validate" data-length="10" v-model="user_info.phone">
  </div>

   <div class="input-field col s12 ">
      <label>Dirección</label>
      <input type="text" name="" required class="validate" data-length="10" v-model="user_info.address">
  </div>

    <div class="col l12 m12 s12 center">
      <br>
      <center ><button  class="waves-effect waves-light btn green" @click="putInfo(user_info)" >Guardar cambios</button></center>
      <br>
      </div>

</div>
   <div class="col l3 m12 s12 hide-on-med-and-down"></div>
</div> 
</li>
    
   
</ul>
</template>

<script>
        let total = 20;
export default {

  name: 'EditPersonal',
  props:['user_info'],
  data () {
    return {

    }
  },
  methods:{
  	putInfo:function(userinfo){

  		axios.put('/api/userinfo/', {
				firstname:userinfo.firstname,
				secondname:userinfo.secondname,
				surname:userinfo.surname,
				secondsurname:userinfo.secondsurname,
				placebirth:userinfo.placebirth,
				birthdate:userinfo.birthdate,
				phone:userinfo.phone,
				address:userinfo.address
			}).then(function(response){
				toastr.success('Información modificada.');
				console.log(response.data);
			}).catch(function (error) {
				toastr.error("Error de put");
					});
        this.getInfo();
  	},
  	getInfo:function(){
  		axios.get('/api/userinfo/').then(response =>{
  			this.user_info = response.data;
  			toastr.info('Datos cargados...');
  		}).catch(error =>{
  			toastr.error('No se pudo consultar');
  		});
  	}
  },
  computed: {
    porcentaje:function() {

       if(this.user_info.firstname)
        {total = total + 10;}

      if(this.user_info.secondname)
       { total = total + 10;}
      
      if(this.user_info.surname)
       { total = total + 10;}

      if(this.user_info.secondsurname)
       { total = total + 10;}

      if(this.user_info.placebirth)
      {  total = total + 10;}

      if(this.user_info.birthdate)
      {  total = total + 10;}
       
       if(this.user_info.phone)
       { total = total + 10;}
       
        if(this.user_info.address)
        {  total = total + 10;}
    
        return total+'%';
      


      
    }
  }
}
</script>

<style lang="css" scoped>
</style>