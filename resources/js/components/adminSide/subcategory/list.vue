<template>
    <div class="container">
            <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">SubCategory</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">SubCategory</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
  <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title">Subcategory</h1>

                <div class="card-tools">
                    <button class="btn btn-success"><i class="fas fa-plus white"> </i> <router-link to="/AddSubcategory" style="color:#fff"> new Subcategory</router-link></button>
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
                      <th>Photo</th>
                      <th>Category</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr  v-for="(sub,index) in getallSubCategory" :key="sub.id">
                      <td>{{index+1}}</td>
                      <td>{{sub.title}}</td>
                      <td>{{sub.description}}</td>
                      <td><img :src="GetPhoto(sub.avatar)" alt="" width="30" height="30"></td>
                      <td v-if="sub.category">{{ sub.category.title }}</td>
                      <td><router-link :to="`/EditSubcategory/${sub.id}`" ><i class="fa fa-edit green"></i></router-link> | <a @click.prevent="deleteSubcategory(sub.id)"> <i class="fa fa-trash red"></i></a></td>
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
        name: "List",
        data(){
            return{
                categoryItem:[],
                //select:'',
                //all_select:false
            }
        },
        mounted(){
            //this.$store.dispatch("allCategory")
        this.$store.dispatch("allSubcategory");

        },
        computed:{
           getallSubCategory(){
                return this.$store.getters.getsubcategory
           }
        },
        methods:{
            GetPhoto(img){
                return "../img/subcategoryImage/"+img;
            },
            deleteSubcategory(id){
                swal.fire ({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!' }).then((result)=>{
                         if(result.value){
                            axios.get('/subcategory/'+id)
                            .then(()=>{
                                this.$store.dispatch('allSubcategory')//had All subcategoy Jaya mn index.js (action)
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


        }
    }
</script>
