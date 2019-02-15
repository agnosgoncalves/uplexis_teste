<template>
    <div class="card-body" id="search-post-results">
      <div class="row" v-if="postsData && postsData.length">
        <div class="card col-12 col-md-4 post" v-for="(post, key) in postsData" :key="key">
          <div class="image" :style="'background-image:'+post.image"></div>
          <div class="container">
            <div class="date-terms">{{post.terms}}</div>
            <div class="title">{{post.title}}</div>
            <a class="btn btn-primary btn-uplexis" :href="post.link">continue lendo</a>
            <a class="btn btn-primary btn-uplexis btn-danger" @click="remove(post.id)" v-if="get_db_posts">remover artigo</a>

          </div>
        </div>
      </div>
      <div class="loading-mask" v-show="loading"></div>
    </div>
</template>

<script>
  export default {
    data () {
      return {
        loading: false,
        postsData: []
      }
    },
    props: {
      posts: [],
      get_db_posts: false 
    },
    methods: {
      remove (id) {
        this.loading = true
        axios.delete(`api/posts/${id}`).then((res) => {
          this.postsData.find((post, index) => {
            if (post.id === id) {
              this.$delete(this.postsData, index);
              return true;
            }
          })
          this.loading = false
          this.$notify({
            position: 'bottom right',
            group: 'message',
            title: 'Sucesso',
            type: 'success',
            text: 'artigo removido com sucesso'
          });
        }).catch((error) => {
          this.loading = false
          alert(error.message)
          this.$notify({
            position: 'bottom right',
            group: 'message',
            title: 'Sucesso',
            type: 'error',
            text: 'ocorreu um erro ao tentar excluir o artigo!'
          });
        })
      }
    },
    watch : {
      posts () {
        this.postsData = this.posts 
      }
    },
    mounted () {
      if (this.get_db_posts && !this.posts) {
        this.loading = true
        axios.get('api/posts/all').then((res) => {
          this.loading = false
          this.postsData = res.data
        }).catch((error) => {
          this.loading = false
        })
      } else {
        this.postsData = this.posts
      }
    }
  }
</script>
