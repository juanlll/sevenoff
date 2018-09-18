import EditPersonal from './components/EditPersonal';
Vue.component('edit-personal',EditPersonal);

let vcip = new Vue({
	el: "#vcip",
	data:{
		user_info:[]
	},
	created:function(){
		this.user_info = userinfo;
	}
	
});