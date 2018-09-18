 import OfferCard from './components/OfferCard';
  Vue.component('offer-card',OfferCard);


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



  Vue.component('images-gallery',{
  	template:`<div class="row hoverable" style=" overflow-y: auto; height: 210px; margin:0px; padding:0px;">
  	<div class="col l12 m12 s12 blue lighten-2"><p style="color:white; font-style:bold;">Galeria de imagenes</p></div>
  	<div class="col l3 m4 s6 ">
  	<a class="modal-trigger" href="#modal_upload_image">
  	<i class="material-icons large center">image</i><br>
  	Subir imagen
  	</a>
  	</div>

  	<div v-if="images" class="col l3 m4 s6" v-for="img in images" style="margin:0px; padding:2px;">
  	<img :src="img.url" height="150" width="100%" >

  	<div class="chip" style="position:relative; bottom:40px;">
  	<i class="material-icons " style="cursor: pointer;" @click="deleteImage(img.id)" >delete_forever</i>
  	<i class="material-icons " style="cursor: pointer;" @click="putImage(img.url)" >wallpaper</i>
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

  	<div id="modal_upload_image" class="modal">
  	<div class="modal-content">
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
  	</div>
  	<div class="modal-footer">
  	<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
  	</div>
  	</div>
  	</div>
  	`,
  	 data () {
    return {
		images:null
    }
  },
  created:function(){
this.images = images;
  },
  	methods:{
  		putImage:function(url){
       vo.offer.image = url;
       },
		deleteImage: function(id) {// eliminar datos con axios
      axios.delete('/api/images/' + id).then(response => { //eliminamos
      toastr.success('Imagen eliminada'); //mensaje
  });
      this.getImages();
  },
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
  		$('#modal_upload_image').modal('close');
  	}).catch(function (error) {
  		toastr.error('No se pudo publicar');
  	});
  	this.getImages();

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

});



let vo = new Vue({//Vista Offer = vo

	el: "#vo",
	data:{
		offer:[],
		images:[]
	},
	created:function(){
		this.offer = offer;
		this.images = images;

	},
	methods:{
		putOffer:function(){

			axios.put('/api/offer/'+offer.id, {
				name: this.offer.name,
				description: this.offer.description,
				duedate: this.offer.duedate,
				discount : this.offer.discount,
				image : this.offer.image,
				price : this.offer.price
			}).then(function(response){
				toastr.success('Oferta modificada.');
			}).catch(function (error) {
				toastr.error("Error");
// if(error.response.data.description){toastr.error(error.response.data.description);}
// if(error.response.data.name){toastr.error(error.response.data.name);}
// if(error.response.data.duedate){toastr.error(error.response.data.duedate);}
// if(error.response.data.image){toastr.error(error.response.data.image);}
// if(error.response.data.price){toastr.error(error.response.data.price);}
});
		}
	}
});


