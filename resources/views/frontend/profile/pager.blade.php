  <div id="div_paginador"  v-bind:style="{backgroundColor: appearance.color1}">
  	<center>
  		<button 
  		
  		class="btn waves-effect  amber darken-4" 
  		@click="getOffers(t-1)"
  		v-bind:class="{ 'disabled': active1}">
  		<i class="material-icons">arrow_back</i>
  	</button>
  	<strong>@{{t}} de @{{total}}</strong>
  	<button class=" waves-effect  btn amber darken-4" @click="getOffers(t+1)"
  	v-bind:class="{ 'disabled': active2}">
  		<i class="material-icons">arrow_forward</i>
  	</button>
  </center>
</div>

