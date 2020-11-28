<template>
  <div class="home">
  
  <Formulario></Formulario>
  <Descripcion></Descripcion>
  </div>
</template>

<script>
// @ is an alias to /src
import Descripcion from '@/components/Descripcion.vue'
import Formulario from '@/components/FormHome.vue'

export default {
  name: 'Home',
  components: {
    Descripcion,
    Formulario
  }
  
}
</script>
