<template>
    <div class="container">
        <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Articles</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Articles</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
  <div class="row ">

          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title">Articles</h1>

                <div class="card-tools">
                    <button class="btn btn-success"><i class="fas fa-plus white"> </i><router-link to="/addArticlee" style="color:#fff"> new Article</router-link> </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>

                      <th>ID</th>
                      <th>title</th>
                      <th>description</th>
                      <th>Category</th>
                      <th>User</th>
                      <th>Create at</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(art,index) in getallArticles" :key="art.id">
                      <td>{{ index + 1 }}</td>
                      <td>{{ art.title }}</td>
                      <td>{{ art.description  | miniCaraters}} </td>
                      <td v-if="art.category">{{ art.category.title }} </td>
                      <td v-if="art.user">{{ art.user.name }} tt</td>
                      <td>{{ art.created_at | ourTime}}</td>

                      <td><router-link :to="`/EditArticle/${art.id}`"><i class="fa fa-edit green"></i></router-link> | <a href="#" @click.prevent="deleteArticle(art.id)" > <i class="fa fa-trash red"></i></a></td>
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
import _ from 'lodash'
    export default {
        name: "listArticle",
        mounted() {
           //this.$store.state;///("allCategory");
           this.$store.dispatch("allArticle");
        },
        computed:{
           getallArticles(){
            //return this.$store.getters.getCategory;
                return this.$store.getters.getArticle
           }
        },
        methods:{
            GetPhoto(img){
                return "../img/uploadimage/"+img;
            },
            deleteArticle(id){
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
                                this.$store.dispatch('allArticle')
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
    };
</script>
