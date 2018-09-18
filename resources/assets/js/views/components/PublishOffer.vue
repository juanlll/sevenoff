<template>

<div class="row" style="margin: 0px; padding: 15px; " v-bind:style="{backgroundColor: color1}">

<div class="col 12m l12 s12 white hoverable" style="border-style: solid; border-color:#b1dcfb; border-width: 1px; border-radius: 15px; margin-top:20px;"> 

<div class="col l3 m6 s12">
   <label>Nombre:</label>
  <input type="text" name="name" class="validate" data-length="10" v-model="offer.name">
   <label for="name" data-error="incorrecto" data-success="correcto"></label>
</div>

 <div class="col l3 m6 s12">
   <label>Precio:</label>
  <input type="number" name="price"  class="validate" data-length="10" v-model="offer.price">
   <label for="price" data-error="incorrecto" data-success="correcto"></label>
</div>

<div class="col l3 m6 s12">
   <label>Descuento:</label>
  <input type="text" name="discount"  class="validate" data-length="10" v-model="offer.discount">
  <label class="input-field " for="discount" data-error="incorrecto" data-success="correcto"></label>
</div>

<div class="col l3 m6 s12">
   <label>Vence:</label>
 <input type="date" class="validate" v-model="offer.duedate">
</div>


 <div class="col m4 l4 s12 " >
 <label>Image</label>
<a href="#modal_upload" class="modal-trigger">
  <div  v-if="!image_url" style="background-color: #e0e0e0; width:100%; height:80px; border-radius:15px;"> 
  </div>
    <img v-if="image_url" :src="image_url" width="100%" height="80px" style="border-radius:15px;">
    <i v-if="image_url" @click="closeImage()" style="cursor:pointer;" class="material-icons">close</i>
    </a>
  </div>

<div class="col l8 m8 s12">

  <label>Descripcion</label>
  <textarea name="description" id="textarea1" class="materialize-textarea validate" data-length="300" v-model="offer.description">
  </textarea>
  <label for="description" data-error="incorrecto" data-success="correcto"></label>
</div>
{{image_url}}
<div class="col l3 m3 s12 ">
<button class="btn  red lighten-1" @click="postOffer()"><i class="material-icons" style="vertical-align: middle;" >public</i>Publicar</button>
</div>
</div>
</div>


</template>

<script>
export default {

  name: 'PublishOffer',
  props:['image_url','color1'],
  data () {
    return {
  offer:{name:'',description:'',duedate:'',discount:0,price:''}
    }
  },
  methods:{
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
toastr.error('error al ofertar');
});
appe.getOffers(1);
}
}
}
</script>

<style lang="css" scoped>
</style>