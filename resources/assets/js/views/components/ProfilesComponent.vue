<template>
	<div>
		<div class="row" >
<br>
		<div class=" col l12 m12 s12 white hoverable" style=" border-radius: 15px;">

<div class="col l3 m3 s12">
	<label>Ciudad</label>
	 <v-select class="disabled"  :options="[{label:'foo',value:2},{label:'aaa',value:1}]" disabled></v-select>
</div>


<div class="col l3 m3 s12">
	<label>Categoria</label>
  <v-select v-model="category" :options="categories"></v-select>
</div>

<div class="col l3 m3 s12">
  <label>Palabra clave</label>
<input type="text" name="" v-model="search" style="height:32px;">
</div>

<div class="col l2 m2 s12" style="padding-top: 25px;">
	<button class="btn green" @click="getProfiles(search,category.value)" >BUSCAR</button>

</div>
		
	</div>
</div>
<ul class="collection" v-if="!profiles">
  <li class="collection-item">
  <content-placeholders :rounded="true">
  <content-placeholders-heading  :img="true" />
  </content-placeholders>
  </li>

  <li class="collection-item">
  <content-placeholders :rounded="true">
  <content-placeholders-heading :img="true" />
  </content-placeholders>
  </li>

  <li class="collection-item" :rounded="true">
  <content-placeholders>
  <content-placeholders-heading :img="true" />
  </content-placeholders>
  </li>


</ul>

 

<transition-group name="custom-classes-transition" enter-active-class="animated flipInX"  leave-active-class=" animated flipOutX" tag="ul" class="collection"> 

    <li class="collection-item avatar waves-effect waves-orange" v-for="profile in profiles" :key="profile.id" style="display:block;">
    	<a v-bind:href="'profile/'+profile.id" style="color:black;">
      <img :src="profile.logo" class="circle">
      <span class="title" style="font-weight: bold;" id="icon_favorite">{{profile.name}}</span>
     
      <p>Neiva <br>
         {{profile.cat_name}}
      </p>
       
     <!--  <a href="#!" class="secondary-content grey-text">1<i class="material-icons"  style="vertical-align: middle;">favorite</i></a> -->
      </a>
    </li>

 </transition-group>


</div>
</template>

<script>
import vSelect from 'vue-select';
Vue.component('v-select', vSelect);

import VueContentPlaceholders from 'vue-content-placeholders';
Vue.use(VueContentPlaceholders);
export default {

  name: 'ProfilesComponent',
  props:['categories'],
  data () {
    return {
    	profiles:null,
      category:'',
      search:'',
      selected:null,
       placeholderRows:  [
        {
          height: '400px',
          boxes:[]
        }
      ]
    }
  },
  methods:{
  	getProfiles:function(search,cat){
  		axios.get('/api/profiles/?search='+search+'&cat='+cat).then(response => {
  			this.profiles = response.data;
  			
	});
  	}
  },
  created:function(){
  	this.getProfiles('',1);
  }
}
</script>

<style lang="css" scoped>
</style>