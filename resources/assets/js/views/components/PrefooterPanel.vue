	<template>
	<div class="col l12 m12 s12 " v-bind:style="{backgroundColor: color1}">
		
		<div class="row">
			<br class="hide-on-large-only">
			<br class="hide-on-large-only">
			<br class="hide-on-large-only">
			<br class="hide-on-large-only">
			<div class="col l6 m12 s12 left"> <!--col izq -->
				
				<div class="col l3 m12 s12 left">
					<h5 id="h5_informacion">Categoria</h5> 
					<p v-if="profile.cat_name" id="p_informacion" v-text="profile.cat_name"></p>
					<p v-if="!profile.cat_name"id="p_informacion">Sin categoria</p>
				</div>


				<div class="col l6 m12 s12 left">
					<h5 id="h5_informacion">Dirección</h5> 
					<p id="p_informacion" v-text="profile.address"></p>
					<p v-if="!profile.address" id="p_informacion">Sin dirección</p>
					
				</div>

			</div><!--col izq  finish-->

			<div class="col l6 m12 s12 right">  <!--col der -->

				<div class="col l6 m12 s12 right">
				<h5 id="h5_informacion">Ciudad</h5> 
					<!-- <p id="p_informacion">Neiva</p> -->
					<p v-if="!profile.description" id="p_informacion">Sin ciudad</p>
				</div>

				<div class="col l3 m12 s12 right">
					<h5 id="h5_informacion">Telefono</h5> 
					<p v-if="!profile.phone == 0 || !profile.phone == null " id="p_informacion" class="center" v-text="profile.phone"></p>
					<p v-if="profile.phone == 0" id="p_informacion">Sin telefono.</p>
				</div>

			</div><!--col der  finish-->
			<div class="col l12 m12 s12 center">
				<h5 id="h5_informacion">Descripción</h5>
				<p id="p_informacion" v-text="profile.description"></p>
					<p v-if="!profile.description" id="p_informacion">Sin descripción</p>
			</div>
			<div class="col l12 m12 s12 center">
	<h5 id="h5_informacion">Redes sociales</h5>
	<p id="p_informacion">
		<a v-if="profile.facebook" :href="profile.facebook" target="_blank"><img src="/icons/svg/facebook.svg" width="32" height="32"></a>
		<a v-if="profile.instagram" :href="profile.instagram" target="_blank"><img src="/icons/svg/instagram.svg" width="32" height="32"></a>
		<a v-if="profile.twitter" :href="profile.twitter" target="_blank"><img src="/icons/svg/twitter.svg" width="32" height="32"></a>
	</p>
	<p v-if="profile.facebook == null && profile.twitter == null && profile.instagram == null " id="p_informacion">Sin descripción</p>
			</div>
		</div>

</div>
</template>

<script>
import VueContentPlaceholders from 'vue-content-placeholders';
Vue.use(VueContentPlaceholders);
export default {
  props:[
'color1',
'icon_category',
'icon_address',
'icon_phone',
'icon_web',
'icon_tw',
'icon_fb',
'icon_ins',
'profile'],
  name: 'PrefooterPanel',

  data () {
    return {

    }
  }
}
</script>

<style lang="css" scoped>
</style>