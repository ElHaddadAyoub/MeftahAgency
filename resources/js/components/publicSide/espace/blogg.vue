<template>
  <div class="col-md-12">
       <div class="card">
              <div class="card-header">
                <h1 class="card-title">Mes blog</h1>
                <div class="card-tools">
                    <button class="btn btn-success"><i class="fas fa-plus white"> </i><router-link to="/ajouterblog" style="color:#fff">Ajouter Un blog</router-link> </button>
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
                    <tr v-for="(blog,index) in getAllblog" :key="blog.id">
                      <td>{{ index + 1 }}</td>
                      <td>{{ blog.title}}</td>
                      <td>{{ blog.description | miniCaraters}}</td>
                      <td>{{ blog.created_at | ourTime}}</td>

                      <td> <a href="#"  @click.prevent="deleteblog(blog.id)"> <i class="fa fa-trash red"></i></a></td>
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
           this.$store.dispatch("allblogs");
           //this.$store.dispatch('getcatagoriePag', {currentPage})
            // console.log(this.$store.getters.getannonce);
        },
        computed:{
           getAllblog(){
            //return this.$store.getters.getCategory;
                return this.$store.getters.getblog
           }
        },
    methods:{
        deleteblog(id){
                //ale{{rt("test"+id)
                 swal.fire ({
                    title: 'vous étes sur !',
                    text: "vous etes sur de supprimer ce blog",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'oui , supprime le !' }).then((result)=>{
                        if(result.value){
                                 axios.get('/deleteblog/'+id)
                                .then(()=>{
                                    this.$store.dispatch("allblogs");
                                         swal.fire(
                                        'supprime!',
                                        'le blog a ete supprimer.',
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
