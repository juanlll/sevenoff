
import EditInformation from './components/EditInformation';
Vue.component('edit-information',EditInformation);

import vSelect from 'vue-select';
Vue.component('v-select', vSelect);

import UploadLogo from './components/UploadLogo';
Vue.component('upload-logo',UploadLogo);

import PhotoGallery from './components/PhotoGallery';
Vue.component('photo-gallery',PhotoGallery);



var vm = new Vue({
	el: "#vcp",
	created:function(){
		this.profile = profile;
		this.categories = categories;
		// this.images = images;
		this.appearance = appearance;
	},
	data:{
		profile:null,
		categories:null,
		images:null,
		appearance:null
	}
});