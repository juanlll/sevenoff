<template>

	<div class="row hoverable" style=" overflow-y: auto; height: 210px; margin:0px; padding:0px;">
    <div class="col l12 m12 s12 blue lighten-2"><p style="color:white; font-style:bold;">Galeria de imagenes</p></div>
    <div class="col l3 m4 s6 ">
  <a class="modal-trigger" href="#mo1">
    <i class="material-icons large center">image</i><br>
    Subir imagen
  </a>
    </div>

        <div v-if="images" class="col l3 m4 s6" v-for="img in images" style="margin:0px; padding:2px;">
         <img :src="img.url" height="150" width="100%" >

           <div class="chip" style="position:relative; bottom:40px;">
 <i class="material-icons " style="cursor: pointer;" @click="deleteImage(img.id)" >delete_forever</i>
 <i class="material-icons " style="cursor: pointer;" @click="putLogo(img.url)" >wallpaper</i>
  </div>
        
       </div>



            <div v-if="!images"  class="preloader-wrapper big active">
      
    <div class="spinner-layer spinner-blue-only">
      <div class="circle-clipper left">
        <div class="circle"></div>
      </div><div class="gap-patch">
        <div class="circle"></div>
      </div><div class="circle-clipper right">
        <div class="circle"></div>
      </div>
    </div>
  </div>
        
     </div>


</template>

<script>

import { EventBus } from '../components/event-bus.js';
export default {
  name: 'PhotoGallery',

  data () {
    return {
images:null
    }
  },
  created: function () {
  this.getImages();
  EventBus.$on('i-got-clicked', () => {
  this.getImages();
});
},
  methods:{
    getImages:function(){
        axios.get('/api/images').then(response => {
          this.images = response.data;
        });
    },
     deleteImage: function(id) {// eliminar datos con axios
      axios.delete('/api/images/' + id).then(response => { //eliminamos
      toastr.success('Imagen eliminada'); //mensaje
      });
        $('#modal_upload').modal('close');
        this.getImages();
       },
       putLogo:function(url){
         axios.put('/api/appearanceu', {
          logo:url,
        })
        .then(function (response) {
          toastr.success('Logo establecido');
          EventBus.$emit('getAppearance');
        })
        .catch(function (error) {
          toastr.error('No se pudo cambiar logo');
        });

       },
       getUrl:function(url){
         $('#modal_upload').modal('close');
       }
     }
}
</script>

<style lang="css" scoped>
</style>