<template>
    <form class="row" data-js="form-search-posts">
      <div class="col-12 col-md-10 justify-content-center">
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text" id="">Buscar</div>
          </div>
          <input type="text" class="form-control" placeholder="Buscar artigos..." name="search" v-model="search">
        </div>
      </div>
      <div class="col-12 col-md-2">
        <button class="btn btn-primary btn-large btn-block btn-block">Capturar</button>
      </div>
    </form>
</template>

<script>
  export default {
    data () {
      return {
        search: '', 
      }
    },
    mounted() {
    }
  }
</script>
