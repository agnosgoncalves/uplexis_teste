<template>
    <div class="card-body" id="search-post-results">
      <div class="row">
        <div class="card col-12 col-md-4 post" v-for="(post, key) in posts" :key="key">
          <div class="image" :style="'background-image:'+post.image"></div>
          <div class="container">
            <div class="date-terms">{{post.terms}}</div>
            <div class="title">{{post.title}}</div>
            <a class="btn btn-primary btn-uplexis" :href="post.link">continue lendo</a>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
  export default {
    props: {
      posts: null
    }  
  }
</script>
