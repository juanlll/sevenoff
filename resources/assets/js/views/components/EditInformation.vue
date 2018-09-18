  <template>
         <ul class="collection" style="margin-top:0px; margin-bottom:0px;">
          <li class="collection-item grey lighten-3" style="font-weight: bold; margin-top:0px;">LOGO</li>
          <li class="collection-item ">
            <div class="row">
              <div class="col l12 m12 s12" v-if="appearance.logo">
                <img  class="circle" :src="appearance.logo" width="200" height="200">
              </div>
              <div class="col l12 m12 s12"> <photo-gallery></photo-gallery></div>
            </div>
            
           
            </li>
          <li class="collection-item grey lighten-3" style="font-weight: bold;">INFORMACIÓN PÚBLICA</li>
        <li class="collection-item">
          <div class="row">

            <div class="input-field col l6 m6 s12">
              <label>Nombre</label>
              <input type="text" name="" v-model="profile.name">
            </div>

            <div class="col l6 m6 s12">
              <label>Categoria</label>
              <v-select v-model="categ" :options="categories"></v-select>
            </div>

             <div class="input-field col l12 m12 s12">
    <label>Descripcion</label>
      <textarea name="description" id="textarea1" class="materialize-textarea validate" data-length="300" v-model="profile.description"></textarea>
      <label for="description" data-error="incorrecto" data-success="correcto"></label>
  </div>

          </div>
  </li>

  <li class="collection-item grey lighten-3" style="font-weight: bold;">INFORMACIÓN RESIDENCIAL</li>
        <li class="collection-item">
<div class="row">
  
  <div class="input-field col l6 m6 s12">
     <label>Direccion</label>
    <input type="text" name="address" v-model="profile.address" class="validate" data-length="20">
    <label for="address" data-error="incorrecto" data-success="correcto" ></label>
  </div>
    <div class="input-field col l6 m6 s12">
     <label>Telefono</label>
    <input type="number" name="phone" v-model="profile.phone" class="validate" data-length="10">
     <label for="phone" data-error="incorrecto" data-success="correcto"></label>
  </div>

</div>

  </li>



  <li class="collection-item grey lighten-3" style="font-weight: bold;">REDES SOCIALES</li>
    <li class="collection-item">
      <div class="row">

         <div class="input-field col l6 m6 s12">
     <label>Facebook</label>
    <input type="text" name="facebook" v-model="profile.facebook" class="validate" data-length="10">
     <label for="facebook" data-error="incorrecto" data-success="correcto"></label>
  </div>
  <div class="input-field col l6 m6 s12">
     <label>Instagram</label>
    <input type="text" name="instagram" v-model="profile.instagram" class="validate" data-length="10">
     <label for="instagram" data-error="incorrecto" data-success="correcto"></label>
  </div>
  <div class="input-field col l6 m6 s12">
     <label>Twitter</label>
    <input type="text" name="twitter" v-model="profile.twitter" class="validate" data-length="10">
     <label for="twitter" data-error="incorrecto" data-success="correcto"></label>
  </div>

        
      <div class="input-field col l6 m6 s12">
      <label>Web</label>
      <input type="text" name="web" v-model="profile.web" class="validate" data-length="10">
      <label for="web" data-error="incorrecto" data-success="correcto"></label>
     </div>

      </div>
    
  </li>

  <li class=" grey lighten-3" style="font-weight: bold; margin-bottom:0px;">
  
      <button class="btn green center" @click="putInformation()">Guardar</button>

  </li>

  </ul>
  </template>

  <script>
import { EventBus }  from '../components/event-bus.js';
  export default {
    props:['profile','categories','images','appe'],
    name: 'EditInformation',
    created:function(){ 
      this.categ = {value: this.profile.idCategory,label:this.profile.cat_name}; 
      this.appearance = this.appe;
        EventBus.$on('getAppearance', () => {
          this.getAppearance();
        });
    },
    data () {
      return {
      categ:null,appearance:null
      }
    },methods:{
      getAppearance:function(){
         axios.get('/api/appearance').then(response => {
          this.appearance = response.data;
        });
      },
  putInformation:function(){
    axios.put('/api/profileu', {
      name:this.profile.name,
      description:this.profile.description,
      address:this.profile.address,
      phone:this.profile.phone,
      web:this.profile.web,
      facebook:this.profile.facebook,
      instagram:this.profile.instagram,
      twitter:this.profile.twitter,
      idCategory:this.categ.value
  }).then(function(response){
    $('#modal_informacion').modal('close');
  toastr.success('Informacion guardada');

  }).catch(function (error) {
  toastr.error('error Informacion guardada');
  });
  }
  }
  }
  </script>

  <style lang="css" scoped>
  </style>