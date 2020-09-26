<template>
    <div class="container">
        <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Blog</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blog</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="row ">

          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title">Blog</h1>

              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>titre</th>
                      <th>description</th>
                      <th>Auteur</th>
                      <th>Crée en</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(blog,index) in getallBlog" :key="blog.id">
                      <td>{{index+1}}</td>
                      <td>{{blog.title}}</td>
                      <td>{{blog.description | miniCaraters}}</td>
                      <td v-if="blog.user">{{blog.user.name }}</td>
                      <td>{{blog.created_at | ourTime}}</td>

                    <td><a href="#"  @click.prevent="deleteCategory(blog.id)"> <i class="fa fa-trash red"></i></a></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>

    </div>
</template>
<script>
    export default {
        name: "list",
        data(){
            return{
                category:{},
                currentPage: 1,
            }
        },
        mounted() {
           //this.$store.state;///("allCategory");
           this.$store.dispatch("allBlog");
           //this.$store.dispatch('getcatagoriePag', {currentPage})

        },
        computed:{
           getallBlog(){
            //return this.$store.getters.getCategory;
                return this.$store.getters.getAllBlog
           }
        },
        methods:{
            deleteCategory(id){
                //ale{{rt("test"+id)
                 swal.fire ({
                   title: 'vous etes sur?',
                    text: "vous etes sur de supprimer ce blog ",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'oui supprime l\'annonce!' }).then((result)=>{
                        if(result.value){
                                 axios.get('/blog/'+id)
                                .then(()=>{
                                    this.$store.dispatch("allBlog");
                                         swal.fire(
                                            'supprimer!',
                                            'annonce a ete supprimer !',
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

    };
</script>
