<template>
<div class="row">
  <center v-if="v1"><img id="image" height="100px;" width="100px"></center>
  <center v-if="v2"><img id="image2" height="100px;" width="100px"></center>
  <center><input accept="image/*" type="file" value="upload" @change="fileBtn($event)"></center>
  <center v-if="v1"><progress value="0" max="100" id="uploader" style="width:50%;"></progress></center>
  <center v-if="v2"><progress value="0" max="100" id="uploader2" style="width:50%;"></progress></center>
  <center><input style="width:50%;" type="text" placeholder="nombre de la imagen" v-model="image_name">
  <button class="btn purple" @click="postImagen()">Guardar imagen</button>
<input type="text" v-model="image_url" name=""></center>
<!--   <images-gallery :images="images" :v2="v2" :v1="v1" :image_url="image_url"></images-gallery>
 --> 

  <ul class="collection hoverable" style="overflow-y: auto; height: 300px;">
        <li class="collection-item " id="gallery" v-for="img in images">
         <img class="circle" :src="img.url" height="64px" width="64px" style="vertical-align: middle;">
         <i  class="material-icons right" style="cursor: pointer;" @click="deleteImage(img.id)" >delete_forever</i>
          <i v-if="v1" class="material-icons right" style="cursor: pointer;" @click="putBanner(img.url)" >wallpaper</i>
         <i v-if="v2" class="material-icons right" style="cursor: pointer;" @click="getUrl(img.url)" >cloud_upload</i>
         <label>{{img.name}}</label>
       </li>
     </ul>

</div>
</template>

<script>
  import firebase from 'firebase'
    const config = {
  apiKey: "AIzaSyC4QkFO3mK-yJhdTM-2vMINKqGHEP28OLw",
  authDomain: "auth-firebase-ea6dc.firebaseapp.com",
  projectId: "auth-firebase-ea6dc",
  storageBucket: "auth-firebase-ea6dc.appspot.com",
  messagingSenderId: "675311533928"
    }
    const app = firebase.initializeApp(config);
    let image_url;
export default {
  props:['v1','v2','image_url','v1','v2'],
  name: 'UploadImage',
   data () {
    return {
      images:[],image_name:""
    }
  },
  created:function(){
    this.getImages();
  },
  methods:{  deleteImage: function(id) {// eliminar datos con axios
    axios.delete('/api/images/' + id).then(response => { //eliminamos
      toastr.success('Imagen eliminada'); //mensaje
    });
    $('#modal_upload').modal('close');
    // this.cargarImagenes();
       },
       putBanner:function(url){
         axios.put('/api/appearanceu', {
          background:url,
        })
        .then(function (response) {
          toastr.success('banner correctamente!');
          this.appearance.background = url; 
        })
        .catch(function (error) {
          toastr.error('No se pudo publicar');
        });
       },
       getUrl:function(url){
        
        // this.image_url = url;
         $('#modal_upload').modal('close');
       },
    getImages:function(){
        axios.get('/api/images').then(response => {
          this.images = response.data;
        });
      },
      postImagen:function(){
      axios.post('/api/images', {
        name:this.image_name,
        url:image_url
      }).then(function (response) {
        toastr.success('Publicado correctamente!');
        console.log(response);
       }).catch(function (error) {
       toastr.error('No se pudo publicar');
      console.log(error);
      });
      },
    fileBtn(e){
        e.preventDefault();
      const uploader = document.getElementById('uploader');
      const image = document.getElementById('image');
      const uploader2 = document.getElementById('uploader2');
      const image2 = document.getElementById('image2');
      //get file
      let getFile = e.target.files[0];
      //set storage ref
      let storageRef = firebase.storage().ref('micarpeta/'+getFile.name);
      //upload file
      let task = storageRef.put(getFile);
      task.on('state_changed',
       function progress(snapshot){

        let percentage = (snapshot.bytesTransferred / snapshot.totalBytes) *100;
        uploader.value = percentage;
        uploader2.value = percentage;
        

      },
      function error(err){
        console.log(err);
      },
      function complete(){
         console.log('complete upload');
        image.src = task.snapshot.downloadURL;
        image2.src = task.snapshot.downloadURL;
        image_url = task.snapshot.downloadURL;

      }
      );

    }
  }
}
</script>
