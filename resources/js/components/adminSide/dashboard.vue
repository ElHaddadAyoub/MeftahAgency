<style>
#agenda{
    margin-left: 240px !important;
}
</style>
<template>
  <div class="container">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tableau de bord</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tableau de bord</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ countArticles }}</h3>

                <p>Articles</p>
              </div>
              <div class="icon">
                <i class="fas fa-scroll"></i>
              </div>
             
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ countBlog }}<sup style="font-size: 20px"></sup></h3>

                <p>Blog</p>
              </div>
              <div class="icon">
                <i class="fab fa-blogger"></i>
              </div>
             
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ countUsers }}</h3>

                <p>Utilisateurs</p>
              </div>
              <div class="icon">
               <i class="fas fa-users"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Visiteurs</p>
              </div>
              <div class="icon">
               <i class="fas fa-street-view"></i>
              </div>
             
            </div>
          </div>
          <!-- ./col -->

    </div>

       </div>
</template>

<script>

    export default {

        data(){
            return{
                countArticles:null,
                countUsers:null,
                countBlog:null,
            }
        },
        mounted() {
             //this.$store.dispatch("getCountArticle")
            axios.get('/countArticle')
            .then(({data}) => {
                //context.commit('countArticle',response.data.countArticle);
                this.countArticles = data.countArticle;
            })
            axios.get('/users')
            .then(({data}) => {
                //context.commit('countArticle',response.data.countArticle);
                this.countUsers = data.countUser;
            }),
            axios.get('/allblog')
            .then(({data}) => {
                //context.commit('countArticle',response.data.countArticle);
                this.countBlog = data.countBlog;
            })
        },
        computed:{

        },

        components:{

        },
        methods:{
/*   getCount(){
            axios.get('/countArticle')
            .then(({data}) => {
                //context.commit('countArticle',response.data.countArticle);
                this.countArticles = data.countArticle;
            })
            }*/
        },


    };
</script>
