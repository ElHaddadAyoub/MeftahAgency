<template>
    <div class="container">
         <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Utilisateur</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Utilisateur</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
  <div class="row">

          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title">Utilisateur</h1>

                <!-- <div class="card-tools">
                    <button class="btn btn-success"><i class="fas fa-plus white"> </i> <router-link to="/AddUser" style="color:#fff;">new User</router-link> </button>
                </div> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nom</th>
                      <th>Email</th>
                      <th>Inscrit En</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(user,index) in getallUsers" :key="user.id">
                      <td>{{index+1}}</td>
                      <td>{{ user.name }}</td>
                      <td>{{ user.email }}</td>
                      <td>{{ user.created_at | ourTime }}</td>
                      <td><a href="#" @click.prevent="deleteUser(user.id)"> <i class="fa fa-trash red"></i></a></td>
                      <!-- <td><router-link :to="`/Edituser/${user.id}`"><i class="fa fa-edit green"></i></router-link> | <a href="#" @click.prevent="deleteUser(user.id)"> <i class="fa fa-trash red"></i></a></td> -->
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
        mounted() {
           //this.$store.state;///("allCategory");
           this.$store.dispatch("allUsers");
        },
        computed:{
           getallUsers(){
            //return this.$store.getters.getCategory;
                return this.$store.getters.getusers
           }
        },
        methods:{

            deleteUser(id){
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
                                 axios.get('/user/'+id)
                                .then(()=>{
                                    this.$store.dispatch("allUsers");
                                         swal.fire(
                                        'Deleted!',
                                        'User has been deleted.',
                                        'success'
                                        )
                                         //Fire.$emit('3awd');
                                        //this.$router.push('/Listcategory');
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
