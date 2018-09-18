import EditUser from './components/EditUser';
Vue.component('edit-user',EditUser);

var vcu = new Vue({
	el: "#vcu",
	created:function(){
this.user = user;
console.log(this.user);
	},
	data:{
	user:null,
	images:null
	},methods:{
      getUser:function(){
      axios.get("/api/user").then(response => {
      this.user = response.data;
      console.log(response.data);
    });
  }

	}
});