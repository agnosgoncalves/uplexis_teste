<template>
  <div>
    <form class="row" data-js="form-search-posts" v-on:submit.prevent="onFindPosts" v-on:keyup.13="onFindPosts">
      <div class="col-12 col-md-10 justify-content-center">
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text" id="">Buscar</div>
          </div>
          <input type="text" class="form-control" placeholder="Buscar artigos..." name="search" v-model="search">
        </div>
      </div>
      <div class="col-12 col-md-2">
        <button class="btn btn-primary btn-large btn-block btn-block" v-if="search.length >= minStringSeach">Capturar</button>
      </div>
    </form>
    <div class="loading-mask" v-show="loading"></div>
  </div>
</template>

<script>
  export default {
    data () {
      return {
        posts: [],
        minStringSeach: 3, // min caracters to init search
        search: '', 
        loading: false,
        error: null
      }
    },
    methods: {
      savePosts (posts) {
        return new Promise((resolve, reject) => {
          axios.post(`api/posts/save`, posts).then((res) => {
            resolve();
          }).catch(()=>{
            reject();
          })
        })
      },
      getDataPosts (content) {
        var data = [];
        var $html = document.createElement('html')
        var $posts = ''
        $html.innerHTML = content.data
        $posts = $html.querySelectorAll('.post');
        $posts.forEach((post) => {
          data.push({
            title: post.querySelector('.title') ? post.querySelector('.title').innerText: '',
            link: post.querySelector('a') ? post.querySelector('a').href : '',
            terms: post.querySelector('.date-terms') ? post.querySelector('.date-terms').innerText : '',
            image: post.querySelector('.image') ? post.querySelector('.image').style.backgroundImage : ''
          })
        })
        return data;
      },
      // find posts in external domain
      onFindPosts () {
        var search = encodeURIComponent(this.search);
        this.loading = true
        axios.get(`api/posts/uplexis?search=${search}`).then((html) => {
          this.posts = this.getDataPosts(html);
          this.savePosts(this.posts).then((res) => {
            this.loading = false
            this.$emit('success', this.posts)
          }).catch((error)=>{
            this.loading = false
            this.$emit('error', error)
          })
        }).catch((error) => {
          this.loading = false
          this.$emit('error', error)
        })
      },
      // html deletion of returned posts
      clearPosts () {
        this.posts = []
      },
    },
    mounted () {
    },
    watch: {
      search (value) {
        if (value.length < this.minStringSeach) this.clearPosts()
      }
    }
  }
</script>
