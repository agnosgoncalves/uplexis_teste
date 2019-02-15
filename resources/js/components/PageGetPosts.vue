<template>
  <div class="card">
    <header class="card-header">
      <p>Encontre os artigos na página principal do blog <a href="http://www.uplexis.com.br/blog">uplexis</a>.</p>
      <form-get-posts  v-on:success="OnSuccess" v-on:error="OnError" />
    </header>
    <list-posts :posts="posts" />
  </div>
</template>

<script>
  export default {
    data () {
      return {
        posts: []
      }
    },
    methods: {
      OnSuccess (posts) {
        this.$notify({
          position: 'bottom right',
          group: 'message',
          title: 'Sucesso',
          type: 'success',
          text: 'artigos encontrados e salvos no sistema!'
        });
        this.posts = posts
      },
      OnError (error) {
        this.$notify({
          position: 'bottom right',
          group: 'message',
          title: 'Erro',
          type: 'error',
          text: 'artigos não encontrados!'
        });
        this.posts = []
      }
    }
  }
</script>
