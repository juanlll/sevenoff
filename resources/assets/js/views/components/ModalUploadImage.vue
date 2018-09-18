<template>

	  <!-- Modal Trigger -->
  <a class="waves-effect waves-light btn modal-trigger" :href="url">Modal</a>

  <!-- Modal Structure -->
  <div :id="url" class="modal">
    <div class="modal-content">
      <h4>{{title}}</h4>
      <p>{{description}}</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>
          
</template>

<script>
export default {
  name: 'ModalUploadImage',
  props:['description','title','url'],
  data () {
    return {

    }
  }
}
</script>

<style lang="css" scoped>
</style>