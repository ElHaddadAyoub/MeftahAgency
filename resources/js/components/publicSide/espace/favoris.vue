<template>
  <div class="col-md-12">
       <div class="card">
              <div class="card-header">
                <h1 class="card-title">Mes Favoris</h1>
               
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>title</th>
                      <th>description</th>
                      <th>Create at</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(favoris,index) in getallfavoris" :key="favoris.id">
                    
                      <td>{{ index + 1 }}</td>
                      <td>{{ favoris[0].title }}</td>
                       <td>{{ favoris[0].description | miniCaraters }}</td>
                      <td>{{ favoris[0].updated_at | ourTime}}</td> 

                      <td> <router-link
                                    :to="`/soloArticle/${favoris[0].id}`"
                                    class="card-link"
                                    href="#"
                                >Vers l'annonce <i class="fas fa-angle-double-right"></i> </router-link></td>
                    </tr> 
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
              </div>
            </div>
  </div>
</template>
<script>
export default {
     mounted() {
           this.$store.dispatch("allFavoris");
        //    console.log(this.$store.getters.getFavoris);
           //this.$store.dispatch('getcatagoriePag', {currentPage})

        },
        computed:{
           getallfavoris(){
            //return this.$store.getters.getCategory;
                
                return this.$store.getters.getFavoris
                
                
           }
        },
        methods:{
        deleteAnnonce(id){
        

            },


        },
}
</script>
