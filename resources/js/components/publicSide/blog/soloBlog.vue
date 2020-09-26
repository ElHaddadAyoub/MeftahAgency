<template>
<div class="container">
    <div class="row" data-aos="fade-up">
                <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                <h2>Blog</h2>
                </div>
                </div>
                </div>

    <div class="col-md-8 col-sm-8 col-xs-12">

            <div class="row m-12">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <!-- single-blog start -->
                <article class="blog-post-wrapper">
                  <div class="post-thumbnail">
                    <img :src="GetPhoto(soloblog.photo)" width="500px" height="300px" alt="">
                  </div>
                  <div class="post-information">
                    <h2>{{ soloblog.title }}</h2>
                    <div class="entry-meta">
                      <span class="author-meta"><i class="fa fa-user"></i> <a href="#" v-if="soloblog.user">{{ soloblog.user.name }}</a></span>
                      <span><i class="fa fa-clock-o"></i> {{ soloblog.created_at | ourTime }}</span>
                    
     
                    </div>
                    <div class="entry-content">
                     {{ soloblog.description }}
                    </div>
                  </div>
                </article>


                <!-- single-blog end -->
              </div>
            </div>
          </div>
          </div>
</template>
<script>
export default {

        name: "Soloblog",
        mounted() {
            this.soloBlog();
        },
        computed:{

        soloblog(){
                return this.$store.getters.soloblog
            }
        },
        methods:{
        soloBlog(){
            this.$store.dispatch('getsoloblog',this.$route.params.blogid);
        },
          GetPhoto(img){
                return "../img/blog/"+img;
            },
        }
}
</script>

