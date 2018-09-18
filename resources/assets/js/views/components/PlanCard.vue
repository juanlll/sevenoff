<template>
	<div>
	<div class="row">
         <h5>Plan</h5>
         <label>
          Concepto de planes de servicios y suscripciones. En otras palabras, una suscripción es un conjunto de recursos definidos por un plan y disponible para un cliente determinado.
        </label>
        <hr>

	<div class="col s12 m6 l4">
          <div class="card z-depth-5" style="border-radius: 15px;">
            <div class="col l12 m12 s12" :style="{backgroundColor: color}">
             <center><h3 style="color:white;font-weight: bold;">{{title}}</h3></center>
            </div>
              <div class="col l12 m12 s12" style="background-color: #eeeeee;">
               <center>$28.000/Mes</center>
              </div>
              <div class="col l12 m12 s12" style="background-color:#bdbdbd;">
               <center><strong>Numero de ofertas:</strong> 15 al mes <i class="material-icons">check</i></center>
              </div>
              <div class="col l12 m12 s12" style="background-color:#eeeeee;">
               <center><strong>Banner en inicio:</strong>1 <i class="material-icons">check</i></center>
              </div>
              <div class="col l12 m12 s12" style="background-color:#bdbdbd;">
               <center><strong>Numero de ofertas:</strong> 15 al mes <i class="material-icons">check</i></center>
              </div>
            <div class="card-content black-text ">
              <p>En 30 dias habiles puedes tener 15 publicaciones activas</p>
            </div>
            <div class="card-action" :style="{ backgroundColor:color }">
              
            <center><a href="#" class="btn orange">Probar</a></center>
            </div>
          </div>
        </div>


        <button v-if="!op2" @click="op2=true" class="btn orange right"><i class="material-icons tiny" style="vertical-align: middle;">mode_edit
        </i>Modificar</button>
        <button v-if="op2" @click="op2=false" class="btn orange right">Contraer</button>
      </div>

       <transition name="custom-classes-transition" enter-active-class="animated bounceIn"  leave-active-class="bounceOut">

      <div v-if="op2" class="row" style="border-radius: 15px; border-style:solid; border-width: 1px; border-color: #f37f1f;">
        <h1>AQUI VAN LOS PLANES</h1>

      </div>

      </transition>
</div>
</template>

<script>
export default {

  name: 'PlanCard',
  props:['color','title','price','button'],
  data () {
    return {
 op2:false
    }
  }
}
</script>

<style lang="css" scoped>
</style>