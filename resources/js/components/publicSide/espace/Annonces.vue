<template>
  <div class="col-md-12">
       <div class="card">
              <div class="card-header">
                <h1 class="card-title">Mes Annonces</h1>
                <div class="card-tools">
                    <button class="btn btn-success"><i class="fas fa-plus white"> </i><router-link to="/ajouterAnnonce" style="color:#fff">Ajouter Une Annonces</router-link> </button>
                </div>
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
                    <tr v-for="(annonce,index) in getallannonces" :key="annonce.id">
                      <td>{{ index + 1 }}</td>
                      <td>{{ annonce.title}}</td>
                      <td>{{ annonce.description}}</td>
                      <td>{{ annonce.created_at }}</td>

                      <td><router-link :to="`/EditAnnonce/${annonce.id}`" ><i class="fa fa-edit green"></i></router-link> | <a href="#"  @click.prevent="deleteAnnonce(annonce.id)"> <i class="fa fa-trash red"></i></a></td>
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
           this.$store.dispatch("allannonces");
           //this.$store.dispatch('getcatagoriePag', {currentPage})

        },
        computed:{
           getallannonces(){
            //return this.$store.getters.getCategory;
                return this.$store.getters.getannonce
           }
        },
                methods:{
        deleteAnnonce(id){
                //ale{{rt("test"+id)
                 swal.fire ({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!' }).then((result)=>{
                        if(result.value){
                                 axios.get('/article/'+id)
                                .then(()=>{
                                    this.$store.dispatch("allannonces");
                                         swal.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                        )
                                })
                                .catch(()=>{
                                     swal.fire("Failed!", "There was something wronge.", "warning");
                                })
                        }

                    })

            },


        },
}
</script>
