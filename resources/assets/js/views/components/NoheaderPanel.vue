<template>
<nav id="div_noheader" v-bind:style="{backgroundColor: color1}">
<div class="nav-wrapper">
<ul class="left">
</ul>
</div>
</nav>
</template>

<script>
export default {
  props:['color1'],
  name: 'NoheaderPanel',

  data () {
    return {

    }
  }
}
</script>

<style lang="css" scoped>
</style>