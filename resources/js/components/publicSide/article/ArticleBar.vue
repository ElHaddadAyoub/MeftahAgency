<template>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mt-4">
            <div class="page-head-blog">
              <div class="single-blog-page">
                <!-- search option start -->
                <form action="#">
                  <div class="search-option">
                    <input @keyup="chercheArticle" type="text" v-model="keyword" placeholder="Search...">
                    <button class="submit" @click.prevent="chercheArticle" type="submit">
                      <i class="fa fa-search"></i>
                    </button>
                  </div>
                </form>
                <!-- search option end -->
              </div>
              <div class="single-blog-page">
                <!-- recent start -->
                <div class="left-blog">
                  <h4>recent post</h4>
                  <div class="recent-post" v-for="(article,index) in getallPostArticles" :key="article.id" v-if="index<2"><!-- v-if : pour afficher juste deux article -->
                    <!-- start single post -->
                    <div class="recent-single-post">
                      <div class="post-img">
                        <a href="#">
                          <img v-if="article.article_images.length"  :src="article.article_images[0].article_image_path" alt="" width="50" height="40">
                        </a>
                      </div>
                      <div class="pst-content">
                        <router-link :to="`/soloArticle/${article.id}`">{{ article.title }}</router-link>
                      </div>
                    </div>
                    <!-- End single post -->
                    <!-- start single post -->
                    <!-- End single post -->
                  </div>
                </div>
                <!-- recent end -->
              </div>
              <div class="single-blog-page">
                <div class="left-blog">
                  <h4>categories</h4>
                  <ul>
                    <li v-for="category in tousCategories" :key="category.id">
                      <router-link :to="`/articleOfCat/${category.id}`">{{ category.title }}</router-link>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="single-blog-page">
                <div class="left-blog">
                  <h4>Tous les Region</h4>
                  <ul>
                    <li v-for="reg in getAllRegion" :key="reg.id">
                      <router-link :to="`/articleOfRegion/${reg.id}`">{{ reg.region }}</router-link>
                    </li>
                  </ul>
                </div>
              </div>

            </div>
        </div>
</template>
<script>
    import _ from 'lodash'
    export default {
        name: "SoloArticle",
        data(){
            return{
                keyword:'',
            }
        },
        mounted() {
            this.$store.dispatch('gettousCategories')
            this.$store.dispatch("dernierArticles")
            this.$store.dispatch("getAllRegionforAnn")
            //this.soloPostarticle();
        },
        computed:{

        tousCategories(){
                return this.$store.getters.tousCategories
        },
        getallPostArticles(){
            //return this.$store.getters.getCategory;
                return this.$store.getters.dernierArticle
           },
        getAllRegion(){
            return this.$store.getters.gettousregion
        }
        },

        components:{

        },
        methods:{
        GetPhoto(img){
            return "../img/uploadimage/"+img;
        },
        chercheArticle:_.debounce(function () {
                this.$store.dispatch('chercheArticle',this.keyword);
            },1000)

        },


    };
</script>
