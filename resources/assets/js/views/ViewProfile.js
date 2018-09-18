
const EventBus = new Vue();
import { Photoshop } from 'vue-color'
Vue.component('photoshop-picker',Photoshop);

$(document).ready(function() {
  $('select').material_select();
}); 

import Firebase from 'firebase';

const config = {
  apiKey: "AIzaSyC4QkFO3mK-yJhdTM-2vMINKqGHEP28OLw",
  authDomain: "auth-firebase-ea6dc.firebaseapp.com",
  projectId: "auth-firebase-ea6dc",
  storageBucket: "auth-firebase-ea6dc.appspot.com",
  messagingSenderId: "675311533928"
}
const app = Firebase.initializeApp(config);


let authService = Firebase.auth();
   // realizamos la autenticación anónima (debe estar activada en la consola de Firebase)
   authService.signInAnonymously()
   .catch(function(error) {
    console.error('Detectado error de autenticación', error);
  });


   let image_url;

   import vSelect from 'vue-select';
   Vue.component('v-select', vSelect);
   import numeral from "numeral";
   import HeaderPanel from './components/HeaderPanel';
   import NoheaderPanel from './components/NoheaderPanel';
// import UploadImage from './components/UploadImage';
    Vue.component('panel-header',HeaderPanel);
    Vue.component('panel-noheader',NoheaderPanel);
    Vue.component('panel-body',{
  props:['name','background','py','showa','px','btn','appearance'],
  template:`
  <div id="div_body" :style="{backgroundPositionX: appearance.bgx+'px' ,backgroundPositionY: appearance.bgy+'px' , backgroundImage: 'url('+appearance.background+')' }" class="row" >
  <center>  <h1 class="center z-depth-4 ">{{name}}</h1></center>
  <a v-if="btn" class="btn-floating orange darken-1 modal-trigger" href="#modal_edit_bgxy"><i class="material-icons left">photo_size_select_small
  </i>Editar</a>

  <a v-if="btn" class="btn-floating yellow darken-1 modal-trigger" href="#modal_apariencia"><i class="material-icons">format_paint</i></a>
  <br>
  <br>
  <br>
  <br>

  <center>
  <img id="img_logo"  :src="appearance.logo" class="circle"  width="200" height="200" style="box-shadow: 0px 0px 10px #949494;"></center >
  </div>`,data () {
    return {
      stylelogo:{
        borderStyle:'solid',
        borderWwidth: '15px',
        borderColor:'black'
      }
    }
  },
  methods:{
    showEditBg:function(){

      if(appe.showadjust == true)
      {
        appe.showadjust = false;
      }else{
        appe.showadjust = true;
      }

    }

  }

});

import PrefooterPanel from './components/PrefooterPanel';
// import OfferCard from './components/OfferCard';
// import PublishOffer from './components/PublishOffer';

Vue.component('panel-prefooter',PrefooterPanel);
Vue.component('card-offer',{
  props:['offer','color1','auth'],
  template:`<transition 
  name="custom-classes-transition" 
  enter-active-class="animated flipInX"  
  leave-active-class="animated flipOutX">

  <div class="col l4 m6 s12 ">

  <div class="card" :style="{backgroundColor: color1}">

  <img :src="offer.logo" class="circle" width="25" height="25" style="vertical-align: top; ">
  <strong  id="title_card">{{offer.profile_name}}</strong>

  <div style=" position:absolute; top:35px; left:0px; z-index:3;" class="chip z-depth-2" >
  <img src="/icons/svg/clock.svg" alt="Contact Person">
  <a style="color:grey;">Vence:</a><a style="color:#26a69a;"> {{since(offer.duedate)}} </a>
  </div>

  <div class="ribbon"><span>{{offer.discount}}%</span></div>

  <div class="card-image waves-effect waves-block waves-light">
  <img class="activator" :src="offer.image" id="img_card">
  </div>

  <div class="card-content" style="height: 32px; padding:0px; padding-left:2px;">
  <span class="card-title activator grey-text text-darken-4" id="title_card" style="">
  {{offer.name}}
  <a style="color:#26a69a; font-size:12px;"></a><i class="material-icons right">info</i> </span>
  </div>

  <div class="card-reveal" id="card_reveal" >
  <div class="row z-depth-2 " id="header_card" :style="{backgroundColor: color1}"><span class="card-title grey-text text-darken-4 center"  id="title_card">{{offer.name}}<i class="material-icons right">close</i></span></div>
  <h4 class="center" v-text="offer.name"></h4>
  <hr>
  <p class="center" v-text="offer.description"></p>
  <hr>
  <a class="center" style="color:black;" >Descuento:</a><a v-text="offer.discount" class="center"></a>
  <hr>
  <a class="center" style="color:black;" >Antes:</a><a v-text="priceFormat(offer.price)" class="center"></a>
  <hr>
  <a class="center" style="color:black;" >Ahora:</a><a class="center" v-text="nowPrice(offer.price,offer.discount)"></a>
  <hr>
  <center>
  <a class="btn blue center" v-if="auth" :href="'/offer/'+offer.id" ><i class="material-icons tiny" >edit</i>Editar oferta</a>
  </center>
    </div>


  </div>
  </div>

  </div>
  </div>
  </transition>
  `, data () {
    return {
      result:null
    }
  },
  methods:{
    editOffer:function(){
      
    },
    showOffer:function(ofi){
      appe.offer = ofi;
    },
    since:function(d){
      return moment(d).endOf('day').fromNow();    
    },
    priceFormat:function(numbers){
      return numeral(numbers).format('($0,0)');
    },
    nowPrice:function(price,discount){
      this.result = (discount * price )/100;
      return this.priceFormat(price-this.result);
    }
  }
});

Vue.component('form-offer',{

  props:['image_url','color1','offer'],
  template:`
  <div class="row" style="margin: 0px; padding: 15px; " v-bind:style="{backgroundColor: color1}">

  <div class="col 12m l12 s12 white hoverable" style="border-style: solid; border-color:#b1dcfb; border-width: 1px; border-radius: 15px; margin-top:20px;"> 
  <div class="row">
  <div class="col l3 m6 s12">
  <label>Nombre:</label>
  <input type="text" name="name" class="validate" data-length="10" v-model="offer.name" required>
  <label for="name" data-error="incorrecto" data-success="correcto" style="position:relative; left:50px; top:40px; font-weight:bold;"></label>
  </div>

  <div class="col l3 m6 s12">
  <label>Precio:</label>
  <input type="number" name="price"  class="validate" data-length="10" v-model="offer.price" required>
  <label for="price" data-error="incorrecto" data-success="correcto" style="position:relative; left:50px; top:40px; font-weight:bold;"></label>
  </div>

  <div class="col l3 m6 s12">
  <label>Descuento:</label>
  <input type="text" name="discount"  class="validate" data-length="10" v-model="offer.discount" required>
  <label for="discount" data-error="incorrecto" data-success="correcto" style="position:relative; left:50px; top:40px;font-weight:bold;" ></label>
  </div>

  <div class="col l3 m6 s12">
  <label>Vence:</label>
  <input type="date" class="validate" name="duedate" v-model="offer.duedate" required>
  <label for="duedate" data-error="incorrecto" data-success="correcto" style="position:relative; left:50px; top:40px; font-weight:bold;"></label>
  </div>
  </div>

  <div class="row">
  <div class="col m4 l4 s12 " >
  <center> <label>Imagen</label></center>
  <center>
  <a href="#modal_upload" class="modal-trigger">
  <i v-if="!image_url"  class="large material-icons">image</i>
  <img v-if="image_url" :src="image_url" width="80" height="80px" style="border-radius:15px;">
  </a>
  </center>
  </div>

  <div class="col l8 m8 s12">
  <label for="textarea1">Descripción</label>
  <textarea id="textarea1" v-model="offer.description" class="materialize-textarea"></textarea>
  </div>
  </div>

  <div class="col l12 m12 s12 ">
  <center>
  <button class="btn  red lighten-1" @click="postOffer()"><i class="material-icons" style="vertical-align: top;" >public</i> Publicar</button>
  </center>
  </div>
  </div>
  </div>
  `,
  created:function(){

  },
  data () {
    return {
      mensajes:null
    }
  },
  methods:{
    emitOffer(of1){
      this.offer.name = of1.name;
      this.offer.description = of1.description;
    },
    postOffer:function(){
      axios.post('/api/offer', {
        name: this.offer.name,
        description: this.offer.description,
        duedate: this.offer.duedate,
        discount : this.offer.discount,
        image : this.image_url,
        price : this.offer.price
      }).then(function(response){
        toastr.success('Posteada la oferta');

      }).catch(function (error) {


      });
      appe.getOffers(1);
      this.offer = {name:'',description:'',duedate:'',discount:0,price:''};
    }
  }
});  


Vue.component('images-gallery',{
  props:['images','v1','v2','image_url'],

  template:`<div>
  <ul class="collection hoverable" style="overflow-y: auto; height: 300px;">
  <li class="collection-item " id="gallery" v-for="img in images">
  <img class="circle" :src="img.url" height="64px" width="64px" style="vertical-align: middle;">
  <i  class="material-icons right" style="cursor: pointer;" @click="deleteImage(img.id)" >delete_forever</i>
  <i v-if="v1" class="material-icons right" style="cursor: pointer;" @click="putBanner(img.url)" >wallpaper</i>
  <i v-if="v2" class="material-icons right" style="cursor: pointer;" @click="getUrl(img.url)" >cloud_upload</i>
  <label>{{img.name}}</label>
  </li>
  </ul>
  </div>`,
  methods:{
     deleteImage: function(id) {// eliminar datos con axios
    axios.delete('/api/images/' + id).then(response => { //eliminamos
      toastr.success('Imagen eliminada'); //mensaje
    });
    $('#modal_upload').modal('close');
    this.getImages();
  },
  putBanner:function(url){
   axios.put('/api/appearanceu', {
    background:url,
  })
   .then(function (response) {
    toastr.success('banner correctamente!');
    appe.appearance.background = url; 
  })
   .catch(function (error) {
    toastr.error('No se pudo publicar');
  });
   this.getImages();
 },
 getUrl:function(url){
  appe.image_url = url;

  $('#modal_upload').modal('close');
},
getImages:function(){
  axios.get('/api/images').then(response => {
    this.images = response.data;
  });
}
}
});




Vue.component('upload-image',{
	props:['v1','v2','image_url'],
	template:`
	<div>
 <center v-if="v1"><img id="image" height="100px;" width="100px"></center>
 <center v-if="v2"><img id="image2" height="100px;" width="100px"></center>
 <center><input accept="image/*" type="file" value="upload" @change="fileBtn($event)"></center>
 <center v-if="v1"><progress value="0" max="100" id="uploader" style="width:50%;"></progress></center>
 <center v-if="v2"><progress value="0" max="100" id="uploader2" style="width:50%;"></progress></center>
 <center><input style="width:50%;" type="text" placeholder="nombre de la imagen" v-model="image_name"></center>
 <center>  <button class="btn purple" @click="postImagen()">Guardar imagen</button></center>
 <images-gallery :images="images" :v2="v2" :v1="v1" :image_url="image_url"></images-gallery>
 </div>
 `,data () {
  return {
    images:[],image_name:""
  }
},
created:function(){
  this.getImages();
},
methods:{
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
    this.getImages();
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
      let storageRef = Firebase.storage().ref('micarpeta/'+getFile.name);
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
});

var bread = new Vue({
  el:'#bread',
  data:{color1:""}
});


var appe = new Vue({
  el: "#div_container",
  data:{
    ss:'',
    image_url:'',
    loading:true,
    offers:[],
    total:0,
    t:0,
    appearance:[],
    url:'',
    active:true,
    images:[],
    profile:[],
    px:0,
    py:0,
    showadjust:false,
    categories:[],
    colors:[],
    offer:[]},
    created:function(){
      this.appearance = appearance;  
       this.getOffers(1); 
      this.profile = profile; 
      this.categories = categories;
      bread.color1 = appearance.color1;
      this.colors.hex = this.appearance.color1;
    },
    watch: {
    // whenever question changes, this function will run
    colors: function (newQuestion, oldQuestion) {
      this.appearance.color1 = this.colors.hex;
      this.changeColor();
    }
  },
  methods:{
    changeColor:function(){
     bread.color1 = appearance.color1;
   },
   putBgPosition:function(){
    axios.put('/api/appearanceu', {
      bgy:this.appearance.bgy,
      bgx:this.appearance.bgx
    }).then(function(response){
      toastr.success('px y py modificado!','Exito:');
    }).catch(function (error) {
      toastr.error('error al modificar');
    });
    this.showadjust = false;
  },
  since:function(d){
   return moment(d).endOf('day').fromNow();    
 },
 getOffers:function(n){
   this.loading = true;
   axios.get('/api/offers/'+id_profile+'?page='+n).then(response => {
    this.offers = response.data.data;
    this.loading=false;
    this.total = response.data.last_page;
    this.t = n;
  });
 },
 putColor:function(){
  axios.put('/api/appearanceu', {color1:this.appearance.color1,
  }).then(function(response){
    toastr.success('Color modificado!');
  }).catch(function (error) {
    toastr.error('Error al cambiar el color');
  });
},
priceFormat:function(numbers){
	return numeral(numbers).format('$ 0,0[.]00');
}

},
computed: {
  active1: function () {
   return this.t == 1 ;
 },
 active2: function () {
  if(this.total <=1){
    return true;
  }else{
    return this.t == this.total;
  }
  
}
}
});


