<template>
 <div class="container">
      <h2>Upload file</h2>
      <vue-base64-file-upload 
        class="v1"
        accept="image/png,image/jpeg"
        image-class="v1-image"
        input-class="v1-image"
        :max-size="customImageMaxSize"
        @size-exceeded="onSizeExceeded"
        @file="onFile"
        @load="onLoad" />
        <button @click="putLogo()">Cambiar logo</button>
    </div>
</template>

<script>
import VueBase64FileUpload from 'vue-base64-file-upload';
export default {
components: { VueBase64FileUpload },
  name: 'ViewOffers',

  data () {
    return {
      customImageMaxSize: 0.5,
      image:{name:"",url:""}
    }
  },
    methods: {
    onFile(file) {
      this.image.name = file.name;
    },
 
    onLoad(dataUri) {
      this.image.url = dataUri;
    },
 
    onSizeExceeded(size) {
      alert(`Image ${size}Mb size exceeds limits of ${this.customImageMaxSize}Mb!`);
    },
    putLogo:function(){
         axios.put('/api/appearanceu', {
          logo:this.image.url,
        })
        .then(function (response) {
          toastr.success('Logo establecido');
        })
        .catch(function (error) {
          toastr.error('No se pudo cambiar logo');
        });

       }
  }
}
</script>

<style lang="css" scoped>
</style>