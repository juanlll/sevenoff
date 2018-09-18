@if (!Auth::guest() && Auth::user()->id == $profile->id)
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.5/quill.core.css" />
<form-offer :img="image_url" :image_url="image_url" :color1="appearance.color1" :offer="offer"></form-offer>
@endif

<div id="div_footer" class="row grey lighten-2" style="border-top-right-radius: 15px; border-top-left-radius: 15px;" >



  <center v-if="loading" >
   <div  class="preloader-wrapper big active">
    <div class="spinner-layer spinner-blue">
      <div class="circle-clipper left">
        <div class="circle"></div>
      </div><div class="gap-patch">
        <div class="circle"></div>
      </div><div class="circle-clipper right">
        <div class="circle"></div>
      </div>
    </div>
  </div>
</center>
@if (!Auth::guest() && Auth::user()->id == $profile->id)

<card-offer v-if="!loading" auth="true" v-for="offer in offers" :offer="offer" :color1="appearance.color1" :key="offer.id"></card-offer>
@else
<card-offer v-if="!loading"  v-for="offer in offers" :offer="offer" :color1="appearance.color1" :key="offer.id"></card-offer>
@endif


<br>

</div>