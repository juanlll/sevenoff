<template>
	<transition name="custom-classes-transition" enter-active-class="animated flipInX"  
	leave-active-class="animated flipOutX">
<div class="col l12 m12 s12 ">

<div class="card hoverable" :style="{backgroundColor: color1}">
<a :href="'/profile/'+offer.idUser"><img  :src="offer.logo" class="circle" width="32" height="32" style="vertical-align: middle; position:relative; left:0px; border-style:solid; barder-color:white;">
  <strong  id="title_card" style="white-space:nowrap;
    text-overflow: ellipsis;">{{offer.profile_name}}</strong></a>
<div style=" position:absolute; top:35px; left:0px; z-index:3;" class="chip z-depth-2" >
<img src="/icons/svg/clock.svg" alt="Contact Person">
<a style="color:grey;">Vence:</a><a style="color:#26a69a;"> {{since(offer.duedate)}} </a>
</div>
<div class="ribbon"><span>{{offer.discount}}%</span></div>

<div class="card-image waves-effect waves-block waves-light">
	
<img class="activator" :src="offer.image" id="img_card">


</div>

<div class="card-content" style="height: 32px; padding:0px; padding-left:2px;">

<span class="card-title activator grey-text text-darken-4 truncate" id="title_card" >
{{offer.name}}
<a style="color:#26a69a; font-size:12px;"></a><i class="material-icons right">info</i></span>
</div>
<div class="card-reveal" id="card_reveal">
<div class="row z-depth-2 " id="header_card" :style="{backgroundColor: color1}"><span class="card-title grey-text text-darken-4 center truncate"  id="title_card" >{{offer.name}}<i class="material-icons right">close</i></span></div>
<ul class="collection" >
      <li class="collection-item grey lighten-3"><i class="material-icons" style="vertical-align:middle;">add</i>Descripcion</li>
      <li class="collection-item">{{offer.description}}</li>
      <li class="collection-item grey lighten-3"><i class="material-icons" style="vertical-align:middle;">add</i>Descuento</li>
      <li class="collection-item">{{offer.discount}}%</li>
      <li class="collection-item grey lighten-3"><i class="material-icons" style="vertical-align:middle;">add</i>Precio</li>
      <li class="collection-item">{{priceFormat(offer.price)}}</li>
    </ul>

<!-- <div class="chip" id="chip_card">
<img src="/icons/svg/clock.svg" alt="Contact Person">
<a style="color:grey;">Vence:</a><a style="color:#26a69a;"> {{since(offer.duedate)}} </a>
</div>

<p class="z-depth-2 yellow lighten-4">{{offer.description}}</p>	

<div class="chip" id="chip_card">
<img src="/icons/svg/tag.svg" alt="Contact Person">
<a style="color:grey;">Descuento:</a> <a style="color:orange; ">{{offer.discount}}%</a>
</div>
<div class="chip" id="chip_card" >
<img src="/icons/svg/clock.svg" alt="Contact Person">
<a style="color:grey;">Antes:</a> <a style="text-decoration: line-through; color:white;">{{priceFormat(offer.price)}}</a>
</div>

<div class="chip" id="chip_card" >
<img src="/icons/svg/clock.svg" alt="Contact Person">
<a style="color:grey;">Ahora:</a> <a style="color:red;">
{{nowPrice(offer.price,offer.discount)}}</a>
</div>

 -->

</div>

</div>
</div>
</transition>
</template>

<script>
import numeral from "numeral";
export default {
  name: 'OfferCard',
  props:['offer','color1'],
  data () {
    return {
    	result:null
    }
  	},
	methods:{
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
}
</script>

<style lang="css" scoped>
</style>