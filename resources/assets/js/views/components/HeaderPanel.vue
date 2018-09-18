<template>

<nav id="div_header" v-bind:style="{backgroundColor: color1}">
<div class="nav-wrapper">
<ul class="left hide-on-small-only">
<li><a class="modal-trigger" href="#modal_apariencia" ><img :src="icon_apa" width="32px" height="32px"> Editar apariencia</a></li>
<li><a class="modal-trigger" href="#modal_informacion"><img :src="icon_inf" width="32px" height="32px"> Editar informacion</a></li>
  <li><a href="collapsible.html"><img :src="icon_edmap" width="32px" height="32px">Editar mapa</a></li>
</ul>
</div>
</nav>
</template>

<script>
export default {
  props:['icon_map','icon_apa','icon_inf','icon_edmap','color1','icon_of'],
  name: 'HeaderPanel',

  data () {
    return {

    }
  }
}
</script>

<style lang="css" scoped>
</style>