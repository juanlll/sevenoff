import OfferCard from './components/OfferCard';
Vue.component('offer-card',OfferCard);
import ProfilesComponent from './components/ProfilesComponent';
Vue.component('profiles-component',ProfilesComponent);


var vm = new Vue({
	el: "#contenedor",
	data:{
		offers:null,categories:null
	},
	created:function(){
		this.offers = offers;

		this.categories = categories;
	}

});

 var instance = M.Carousel.init({
    fullWidth: true,
    indicators: true
  });

  // Or with jQuery

  $('.carousel.carousel-slider').carousel({
    fullWidth: true,
    indicators: true
  });
      