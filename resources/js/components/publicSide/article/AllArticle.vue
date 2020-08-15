<style lang="scss">
@import url('https://fonts.googleapis.com/css?family=Roboto:400,700');

$bg: #eedfcc;
$text: #777;
$black: #121212;
$white: #fff;
$red: #e04f62;
$border: #ebebeb;
$colorofSite : #36B5CC;
$shadow: rgba(0, 0, 0, 0.2);

@mixin transition($args...) {
  transition: $args;
}

* {
  box-sizing: border-box;
  &::before, &::after {
    box-sizing: border-box;
  }
}

.blog-card {
  display: flex;
  flex-direction: row;
  background: $white;
  box-shadow: 0 0.1875rem 1.5rem $shadow;
  border-radius: 0.375rem;
  overflow: hidden;
}

.card-link {
  position: relative;
  display: block;
  color: inherit;
  text-decoration: none;
  &:hover .post-title {
    @include transition(color 0.3s ease);
    color: $red;
  }
  &:hover .post-image {
    @include transition(opacity 0.3s ease);
    opacity: 0.9;
  }
}

.post-image {
  @include transition(opacity 0.3s ease);
  display: block;
  width: 100%;
    object-fit: cover;
}

.article-details {
  padding: 1.5rem;
}

.post-category {
  display: inline-block;
  text-transform: uppercase;
  font-size: 0.75rem;
  font-weight: 700;
  line-height: 2;
  letter-spacing: 0.0625rem;
  margin: 0 0 0.75rem 0;
  padding: 0 0 0.25rem 0;
  border-bottom: 0.125rem solid $border;
}

.post-title {
  @include transition(color 0.3s ease);
  font-size: 1.125rem;
  line-height: 1.4;
  color: $black;
  font-weight: 700;
  margin: 0 0 0.5rem 0;
}
.post-localisation{
@include transition(color 0.3s ease);
  font-size: 1.125rem;
  line-height: 1.4;
  color: $colorofSite;
  font-weight: 700;
  margin: 0 0 0.5rem 0;
}

.post-author {
  font-size: 0.875rem;
  line-height: 1;
  margin: 1.125rem 0 0 0;
  padding: 1.125rem 0 0 0;
  border-top: 0.0625rem solid $border;

}

@media (max-width: 40rem) {
  #container {
    width: 18rem;
    height: 27.25rem;
  }

  .blog-card {
    flex-wrap: wrap;
  }
}



  .post-image {
    height: 100%;
  }

  .blog-card {
    display: grid;
    grid-template-columns: 1fr 2fr;
    grid-template-rows: 1fr;
  }

  @media (max-width: 40rem) {
    .blog-card {
      grid-template-columns: auto;
      grid-template-rows: 12rem 1fr;
    }
  }


</style>
<template>
    <div class="blog-page area-padding">
      <div class="container">
        <div class="row">

          <!-- End left sidebar -->
          <!-- Start single blog -->
        <filterBar></filterBar>
          <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="row">
              <sequential-entrance fromBottom>
              <div class="col-md-12 col-sm-12 col-xs-12 mt-4" v-if="art" v-for="(art, i) in getallPostArticles" :key=i>

                <router-link :to="`/soloArticle/${art.id}`"  class="card-link" href="#">
                <article class="blog-card">
                <img class="post-image"  v-if="art.article_images.length"  width="200px" height="200px" :src="art.article_images[0].article_image_path"/>
                <div class="ribbon-wrapper ribbon-lg">
                <div class="ribbon bg-info">
                   {{ art.prix }} DH
                </div>
                </div>
                <div class="article-details">
                <h4 class="post-category"> {{ art.title }}</h4>
                <h3 class="post-localisation"><i class="fas fa-map-marker-alt"></i>  {{ art.ville}}</h3>
                <h3 class="post-title"><i class="fa fa-calendar"></i> {{ art.created_at | ourTime}}</h3>
                <p class="post-description"> {{ art.description | miniCaraters}}</p>
                <div class="post-author" v-if="art.user"><p> {{ art.user.name }} </p><p v-if="art.category" style="float:right"> {{ art.category.title }} </p></div>

                </div>
                </article>
                </router-link>

              </div>
        </sequential-entrance>

              <!-- End single blog -->
              <div class="blog-pagination">
                <ul class="pagination">
                  <li><a href="#">&lt;</a></li>
                  <li class="active"><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">&gt;</a></li>
                </ul>
              </div>
            </div>
          </div>
            <ArticleBar></ArticleBar>
        </div>
      </div>
    </div><!-- End Blog Page -->

</template>
<script>

    import { mapState } from 'vuex';
    import ArticleBar from './ArticleBar.vue';
    import filterBar from './articleFilterBar.vue';
    export default {

        name: "AllArticle",
        data() {
            return {
                currentPost: '',
            }

        },
        mounted() {
           this.$store.state;///("allCategory");
           this.$store.dispatch("allpostArticles");
        },
        computed:{
             //...mapState(['postArticle'])
           getallPostArticles(){
            //return this.$store.getters.getCategory;
                return this.$store.getters.getpostarticle
           },
           // this is methode to show articles order by category

        },
        beforeMount() {
            this.$store.dispatch('touslesArticle');
        },
        components:{
            ArticleBar,filterBar
        },
        methods:{
            getAllArticlesByCat(){

                if(this.$route.params.id!=null || this.$route.params.ville!=null || this.$route.params.subcategory!=null ||  this.$route.params.prix_min!=null || this.$route.params.prix_max!=null){
                    if(this.$route.path == '/articleofVille/'+this.$route.params.ville){
                        //console.log('testt from')
                         this.$store.dispatch('getArticlesByVille',this.$route.params.ville);
                        //this.$store.dispatch('getArticlesByReg',this.$route.params.id);
                        //console.log('test')
                    }
                    if(this.$route.path == '/articleofVilleSub/'+this.$route.params.ville+'/'+this.$route.params.subcategory+'/'+this.$route.params.prix_min+'/'+this.$route.params.prix_max){
                        //console.log('testt from two')
                         this.$store.dispatch('getArticlesByVilleSub',this.$route.params.ville +'/'+ this.$route.params.subcategory+'/'+this.$route.params.prix_min+'/'+this.$route.params.prix_max);
                        //this.$store.dispatch('getArticlesByReg',this.$route.params.id);
                        }
                    if(this.$route.path == '/articleofsubcategory/'+this.$route.params.subcategory){
                        //console.log('testt subcatgory')
                         this.$store.dispatch('getArticlesBySubcategory',this.$route.params.subcategory);
                        //this.$store.dispatch('getArticlesByReg',this.$route.params.id);
                        //console.log('test')
                    }
                    if(this.$route.path == '/articleOfCat/'+this.$route.params.id){
                        this.$store.dispatch('allArticlesByCat',this.$route.params.id);
                    }if(this.$route.path == '/articleOfRegion/'+this.$route.params.id){
                        this.$store.dispatch('getArticlesByReg',this.$route.params.id);
                        //console.log('test')
                    }

                }else{
                        this.$store.dispatch('allpostArticles');
                        //console.log('testt error')
                        //this.$store.dispatch('touslesArticle');
                }
           },

        },
          watch:{
            $route(to,from){
                this.getAllArticlesByCat();
            }

    }
}
</script>

