<template>
	<div class="row">
  <div class="col l12 m12 s12"><img src="" id="image" class="circle" width="64" height="64"></div>
 <div class="col l12 m12 s12">
  <progress value="0" max="100" id="uploader" style="width:100%;"></progress>

   <div class="file-field input-field">
      <div class="btn">
        <span>Imagen</span>
        <input type="file" accept="image/*" value="upload" @change="fileBtn($event)">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>
    <br>
    <button class="btn blue" @click="postImagen()">Guardar imagen</button>
</div>
	</div>
</template>

<script>
    let image_url;
    let image_name;
  import firebase from 'firebase';
  const config = {
  apiKey: "AIzaSyC4QkFO3mK-yJhdTM-2vMINKqGHEP28OLw",
  authDomain: "auth-firebase-ea6dc.firebaseapp.com",
  projectId: "auth-firebase-ea6dc",
  storageBucket: "auth-firebase-ea6dc.appspot.com",
  messagingSenderId: "675311533928"
  }

const app = firebase.initializeApp(config);
import { EventBus }  from '../components/event-bus.js';
export default {
  name: 'UploadLogo',
  data () {
    return {

    }
  },
 methods:{
   getImages:function(){
        axios.get('/api/images').then(response => {
          this.images = response.data;
          
        });
    },
postImagen:function(){
      axios.post('/api/images', {
        name:image_name,
        url:image_url
      }).then(function (response) {
        toastr.success('Publicado correctamente!');
        console.log(response);
       }).catch(function (error) {
       toastr.error('No se pudo publicar');
      console.log(error);
      });
      this.getImages();
       EventBus.$emit('i-got-clicked');
      },
       fileBtn(e){
        e.preventDefault();
      const uploader = document.getElementById('uploader');
      const image = document.getElementById('image');
      //get file
      let getFile = e.target.files[0];
          image_name = getFile.name;
      //set storage ref

 

      let storageRef = firebase.storage().ref('micarpeta/'+Math.floor(Math.random() * 9999999999));
      //upload file
      let task = storageRef.put(getFile);
      task.on('state_changed',
       function progress(snapshot){

        let percentage = (snapshot.bytesTransferred / snapshot.totalBytes) *100;
        uploader.value = percentage;
        // uploader2.value = percentage;
        

      },
      function error(err){
        console.log(err);
      },
      function complete(){
         console.log('complete upload');
        image.src = task.snapshot.downloadURL;
       
          // $('#mo1').modal('close');

        // image2.src = task.snapshot.downloadURL;
         image_url = task.snapshot.downloadURL;

      }
      );

    }
 }
}
</script>

<style lang="css" scoped>
</style>