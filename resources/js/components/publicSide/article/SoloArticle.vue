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
                <a  slot="icon" @change="ajouterToFavoris(solopostarticle.id)" style="size:30px" class="fa fa-heart" ></a>
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
                <h3 class="coeur"><a href="#" @click.prevent="ajouterToFavoris(solopostarticle.id)" > <i class="fas fa-heart"></i></a></h3>

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
    .coeur{
         position: absolute;
        left: 650px;
        width: 400px;
        top: 10px;
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
        // addToFavorite(val){
        //         axios.post("/addArticle/".val)
        //         .then((response)=>{

        //         })
        // },
        splStr(val){
              return val.split(",")
            },
        soloPostarticle(){
            this.$store.dispatch('getsolopostarticle',this.$route.params.articleid);
        },
        formatPrice(value) {
        let val = (value/1).toFixed(2).replace(' ', '.')
        return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ")
        },
        ajouterToFavoris(id){
              swal.fire ({
                    title: 'ajoute annonce aux favoris?',
                    text: "voullez vous vraiment ajouter aux favoris",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oui' }).then((result)=>{
                         if(result.value){
                            axios.get('/favoris/'+id)
                           console.log('added successflly')
                            .then(()=>{
                                this.$store.dispatch('allArticle')
                                swal.fire(
                                    'Aux Favoris!',
                                    'l\'annonce à bien ajouter aux favoris ',
                                    'success'
                                 )
                                })
                                .catch(()=>{
                                     swal.fire("Error!", "error d\'ajoute d'\'annonce !", "warning");
                                })
                        }
                })
        }
        },
        watch:{
            $route(to,from){
                this.soloPostarticle();
            }
        }

    };
</script>
