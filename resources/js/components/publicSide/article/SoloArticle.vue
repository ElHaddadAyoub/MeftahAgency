<template>
   <div class="blog-page area-padding">

      <div class="container">
        <div class="row">
          <!-- End left sidebar -->
          <!-- Start single blog -->
          <div class="col-md-8 col-sm-8 col-xs-12 mt-4">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                         <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-12">
              <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
               <h3 class="my-3">{{ solopostarticle.title}}</h3>
                      <h2 class="mb-0" style="color:#D54418;font-size:24px">
                  {{ formatPrice(solopostarticle.prix)  }}DH
                </h2>

                <div >
                    <span class="badge badge-info">{{ solopostarticle.surface }} m<sup>2</sup></span> <span class="badge badge-info">{{ solopostarticle.nb_chambre }} Chambres</span> <span class="badge badge-info">{{ solopostarticle.etat }} </span>
                </div>
                <vue-star animate="animated rubberBand" color="#F05654" >
                <a  slot="icon" style="size:30px" class="fa fa-heart" ></a>
                </vue-star>


              <div class="col-12 mt-4">
                               <carousel :perPage="1">
                <slide  v-for="(img, index) in solopostarticle.article_images" :key="index.id">


                        <img class="img-fluid" :src="img.article_image_path"  >

                </slide>
                </carousel>
              </div>
              <div class="col-12 product-image-thumbs">
                <div class="product-image-thumb active" v-for="(img, index) in solopostarticle.article_images" :key="index.id"><img :src="img.article_image_path" alt="Product Image"></div>
              </div>
              <br>
            <!-- </div> -->
            <!-- <div class="col-12 col-sm-6"> -->
                <h5><i class="fas fa-file-alt"></i> Description complète</h5>
              <p>{{ solopostarticle.description }}</p>

              <hr>

 <h5><i class="fas fa-clipboard-list"></i> Caractéristiques supplémentaires:</h5>


                        <h3><span id="badges" class="badge badge-info" v-for="n in splStr(solopostarticle.caracteristique)">{{ n }}</span></h3>




       <hr>

            <h5><i class="fas fa-map-marker-alt"></i> Emplacement:<span v-if="solopostarticle.region" style="float:right;font-size:16px;color:"><i class="fas fa-map-marked-alt"></i>{{ solopostarticle.region.region }} ville: {{ solopostarticle.ville }}</span></h5>
<hr>
<h5><i class="fas fa-question-circle"></i> information sur le proprietaire:</h5>
<h6>Nom  :<span v-if="solopostarticle.user" style="float:right;font-size:16px;color:">{{ solopostarticle.user.name }}</span></h6>
<h6>E-mail :<span v-if="solopostarticle.user" style="float:right;font-size:16px;color:">{{ solopostarticle.user.email }}</span></h6>

<h6>Telephone :<span v-if="solopostarticle.user" style="float:right;font-size:16px;color:">{{ solopostarticle.user.telephone }}</span></h6>



              <div class="mt-4">
                <div class="btn btn-primary btn-lg btn-flat">
                  <i class="fas fa-cart-plus fa-lg mr-2"></i>
                  Add to Cart
                </div>


              </div>

              <div class="mt-4 product-share">
                <a href="#" class="text-gray">
                  <i class="fab fa-facebook-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fab fa-twitter-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-envelope-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-rss-square fa-2x"></i>
                </a>
              </div>

            </div>
          </div>
          <div class="row mt-4">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
                <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae condimentum erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed posuere, purus at efficitur hendrerit, augue elit lacinia arcu, a eleifend sem elit et nunc. Sed rutrum vestibulum est, sit amet cursus dolor fermentum vel. Suspendisse mi nibh, congue et ante et, commodo mattis lacus. Duis varius finibus purus sed venenatis. Vivamus varius metus quam, id dapibus velit mattis eu. Praesent et semper risus. Vestibulum erat erat, condimentum at elit at, bibendum placerat orci. Nullam gravida velit mauris, in pellentesque urna pellentesque viverra. Nullam non pellentesque justo, et ultricies neque. Praesent vel metus rutrum, tempus erat a, rutrum ante. Quisque interdum efficitur nunc vitae consectetur. Suspendisse venenatis, tortor non convallis interdum, urna mi molestie eros, vel tempor justo lacus ac justo. Fusce id enim a erat fringilla sollicitudin ultrices vel metus. </div>
              <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> Vivamus rhoncus nisl sed venenatis luctus. Sed condimentum risus ut tortor feugiat laoreet. Suspendisse potenti. Donec et finibus sem, ut commodo lectus. Cras eget neque dignissim, placerat orci interdum, venenatis odio. Nulla turpis elit, consequat eu eros ac, consectetur fringilla urna. Duis gravida ex pulvinar mauris ornare, eget porttitor enim vulputate. Mauris hendrerit, massa nec aliquam cursus, ex elit euismod lorem, vehicula rhoncus nisl dui sit amet eros. Nulla turpis lorem, dignissim a sapien eget, ultrices venenatis dolor. Curabitur vel turpis at magna elementum hendrerit vel id dui. Curabitur a ex ullamcorper, ornare velit vel, tincidunt ipsum. </div>
              <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> Cras ut ipsum ornare, aliquam ipsum non, posuere elit. In hac habitasse platea dictumst. Aenean elementum leo augue, id fermentum risus efficitur vel. Nulla iaculis malesuada scelerisque. Praesent vel ipsum felis. Ut molestie, purus aliquam placerat sollicitudin, mi ligula euismod neque, non bibendum nibh neque et erat. Etiam dignissim aliquam ligula, aliquet feugiat nibh rhoncus ut. Aliquam efficitur lacinia lacinia. Morbi ac molestie lectus, vitae hendrerit nisl. Nullam metus odio, malesuada in vehicula at, consectetur nec justo. Quisque suscipit odio velit, at accumsan urna vestibulum a. Proin dictum, urna ut varius consectetur, sapien justo porta lectus, at mollis nisi orci et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper. Donec varius massa at semper posuere. Integer finibus orci vitae vehicula placerat. </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>

                <div class="clear"></div>

                <!-- single-blog end -->
              </div>
            </div>
          </div>
          <ArticleBar></ArticleBar>
        </div>
      </div>
    </div><!-- End Blog Page -->


</template>
<style scoped>
    #badges{
        margin: 5px;
    }
    #bd{
        float: left;
    }
</style>
<script>
    import ArticleBar from './ArticleBar.vue';
    //import Slick from 'vue-slick';

    export default {
        name: "SoloArticle",
        mounted() {
            this.soloPostarticle();
        },
        computed:{

        solopostarticle(){
                return this.$store.getters.solopostarticle
            }
        },
        components:{
            ArticleBar,
            //Slick
        },
        methods:{
        splStr(val){
              return val.split(",")
            },
        soloPostarticle(){
            this.$store.dispatch('getsolopostarticle',this.$route.params.articleid);
        },
        formatPrice(value) {
        let val = (value/1).toFixed(2).replace(' ', '.')
        return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ")
    }
        },
        watch:{
            $route(to,from){
                this.soloPostarticle();
            }
        }

    };
</script>
