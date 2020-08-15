<template>
    <div class="container">
            <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Update Users  {{this.$route.params.userid}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Users</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
  <div class="row justify-content-around">
          <div class="col-md-9">


              <!-- /.card-header -->
              <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Update Users</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" @submit.prevent="editUsers()">
               <div class="card-body">
                  <div class="form-group">
                    <label>name</label>
                    <div>
                      <input type="text" v-model="form.name" class="form-control" id="name" name="name" placeholder="name" :class="{ 'is-invalid': form.errors.has('name') }">
                      <has-error :form="form" field="name"></has-error>
                    </div>
                  </div>
                <div class="form-group">
                    <label>Email</label>
                    <div >
                    <input type="text" v-model="form.email" class="form-control" id="email" name="email" placeholder="email" :class="{ 'is-invalid': form.errors.has('email') }">
                    <has-error :form="form" field="email"></has-error>
                    </div>
                </div>
                <div class="form-group">
                <input v-model="form.password" type="password" name="password" placeholder="password"
                class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                <has-error :form="form" field="password"></has-error>
                </div>
                <div class="form-group">
                <label>Grade</label>
                <select  class="form-control" name="Grade" v-model="form.Grade" :class="{ 'is-invalid': form.errors.has('Grade') }">
                <option value="" disabled>Select Grade</option>
                <option value="Admin">Admin</option>
                <option value="Client">Client</option>
                <option value="Blogger">Blogger</option>

                </select>
                <has-error :form="form" field="Grade"></has-error>
                </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info" style="color:#fff;">Update</button>
                  <button type="submit" class="btn btn-danger float-right">Cancel</button>
                </div>
                <!-- /.card-footer -->
              </form>


            </div>

              <!-- /.card-body -->

            </div>
            <!-- /.card -->
          </div>
        </div>

</template>
<script>
export default {
    data() {
        //name:"edit"
         return {
             form: new Form({
                    id:'',
                    name: '',
                    email: '',
                    password: '',
                    Grade: '',
             })
         }
    },
    mounted(){
            axios.get(`/edituser/${this.$route.params.userid}`)
            .then((response)=>{
                this.form.fill(response.data.user)//had category lihna jaya mn lif controller fossst json
            })
    },
    methods:{
        editUsers(){
            //this.$Progress.start();
            this.form.post(`/updateU/${this.$route.params.userid}`)
            .then((response)=>{
                //afficheCategory()
                //this.$Progress.finish();
                this.$router.push('/ListUsers');// routeur a la page des list des catagorie
                toast.fire({
                    icon: 'success',
                    title: 'User updated successfully'
                })
            })
            .catch(()=>{
                   // this.$Progress.fail();
            })
        },
    }
}
</script>
