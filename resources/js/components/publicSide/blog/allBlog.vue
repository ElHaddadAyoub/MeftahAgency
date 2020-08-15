<style lang="scss">


</style>
<template>

      <div class="container">
                <div class="row" data-aos="fade-up">
                <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                <h2>Tous les blog</h2>
                </div>
                </div>
                </div>
        <div class="row">

          <!-- End left sidebar -->
          <!-- Start single blog -->

          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="row">
              <sequential-entrance fromBottom>
             <div class="row">
            <!-- Start Left Blog -->
            <div class="col-md-4 col-sm-4 col-xs-12 mb-4"  v-for="(blog,index) in getallBlog">
              <div class="single-blog">
                <div class="single-blog-img">
                  <a href="blog.html">
                    <img :src="GetPhoto(blog.photo)" width="1000" height="700" alt="">
                  </a>
                </div>
                <div class="blog-meta">
                  <span class="date-type">
                    <i class="fa fa-calendar"></i>{{ blog.created_at }}
                  </span>
                </div>
                <div class="blog-text">
                  <h4>
                    <a href="">{{ blog.title }}</a>
                  </h4>
                  <p>
                    {{ blog.description | miniCaraters }}
                  </p>
                </div>
                <span>
                  <router-link :to="`/soloBlog/${blog.id}`" class="ready-btn">Read more</router-link>
                </span>
              </div>
              <!-- Start single blog -->
            </div>


          </div>
        </sequential-entrance>

              <!-- End single blog -->

            </div>
          </div>

        </div>
      </div>


</template>
<script>

    import { mapState } from 'vuex';
    export default {

        name: "allBlog",
        data() {
            return {
                //currentPost: '',
            }

        },
        mounted() {
           this.$store.state;///("allCategory");
           this.$store.dispatch("allBlog");
        },
        computed:{
            getallBlog(){

                return this.$store.getters.getAllBlog
            },
        },

        components:{

        },
        methods:{
             GetPhoto(img){
                return "../img/blog/"+img;
            },

        }
}
</script>

