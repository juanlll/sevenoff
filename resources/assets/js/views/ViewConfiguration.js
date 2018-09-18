import PlanCard from './components/PlanCard';
import EditUser from './components/EditUser';
import EditPlan from './components/EditPlan';
Vue.component('plancard',PlanCard);
Vue.component('edituser',EditUser);
Vue.component('editplan',EditPlan);

var vc = new Vue({
  el: "#vc",
  created:function(){this.user = user;},
  data:{op1:false,op2:false,op3:false,user:null,oldp:""}
});
