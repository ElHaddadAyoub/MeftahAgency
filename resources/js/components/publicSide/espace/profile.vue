<style>
.widget-user-header{
    background-position: center center;
    background-size: cover;
    height: 260px !important;
}
.widget-user .card-footer{
    padding: 0;
}

</style>
<template>
<div class="col-md-12">
    <div class="col-md-12">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user" v-for="tt in getallInfos" :key="tt.id">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header text-white" style="background: url('./img/cover.jpg') center center;">
                <h1 class="widget-user-username text-left" >{{ tt.name }}</h1>
                <h5 class="widget-user-desc text-left"><span class="badge badge-warning">User</span></h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle"  :src="GetPhoto(tt.photo)" alt="User Avatar">
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">3,200</h5>
                      <span class="description-text">SALES</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">13,000</h5>
                      <span class="description-text">FOLLOWERS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">35</h5>
                      <span class="description-text">PRODUCTS</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
           <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="activity">
                    <!-- Post -->
                    <h1 class="text-cener">Activty of User</h1>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->

                  <!-- /.tab-pane -->

            <div class="tab-pane" id="settings">
            <form role="form" enctype="multipart/form-data" @submit.prevent="updateProfile()">
            <div class="card-body">
            <div class="form-group">
            <label for="postId">Name </label>
            <input type="text" class="form-control" id=""  v-model="form.name" name="name" :class="{ 'is-invalid': form.errors.has('name') }">
            <has-error :form="form" field="name"></has-error>
            </div>
            <div class="form-group">
            <label for="descriptionId">Email</label>

            <input type="email"  class="form-control" name="email" v-model="form.email">

            <has-error :form="form" field="email"></has-error>
            </div>
            <div class="form-group" >
                <div class="form-group">
            <label for="descriptionId">Photo</label>
            <input @change = "changePhoto($event)" name="photo"  class="form-control" type="file" :class="{ 'is-invalid': form.errors.has('photo') }">
            <img :src="updateImage()" alt="" width="80" height="80">
            
            <has-error :form="form" field="photo"></has-error>
                </div>
            </div>
            <div class="form-group">
            <label for="descriptionId">password</label>
            <input type="password"  class="form-control" name="password" v-model="form.password">
            <has-error :form="form" field="password"></has-error>
            </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>

                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>

</div>
</template>
<script>
export default {

    data() {
        name:"profile"

         return {

             form: new Form({
                    id:'',
                    name: '',
                    email: '',
                    photo: '',
                    password:'',
             })
         }
    },
     mounted() {
            //this.getAllInfos();
           this.$store.dispatch('getUserProfile');
           /* axios.get('/editProfile')
           .then((response)=>{
               this.form.fill(response.data.profile)
           })

 */
        },
        computed:{
           getallInfos(){
            //return this.$store.getters.getCategory;
                return this.$store.getters.getUserprofile

           }
        },
        methods:{
            GetPhoto(img){
                return "../img/profile/"+img;
            },
            getAllInfos(){
                this.$store.dispatch("getUserProfile");
                //console.log(this.$store.getters.getUserprofile.id);
            },
             changePhoto(event){
                let file = event.target.files[0];
                if(file.size>1048576){
                    swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                    })
                }else{
                    let reader = new FileReader();
                    reader.onload = event => {
                        this.form.photo = event.target.result
                        //console.log(event.target.result)
                    };
                    reader.readAsDataURL(file);
                }
            },
        updateProfile(){
            //this.$Progress.start();
            this.form.post('/updateProfile')
            .then((response)=>{
                //afficheCategory()
                //this.$Progress.finish();
                this.$router.push('/EspaceUser');// routeur a la page des list des catagorie
                toast.fire({
                    icon: 'success',
                    title: 'User Profile updated successfully'
                })
            })
            .catch(()=>{
                   // this.$Progress.fail();
            })
        },
                updateImage(){
                let img = this.form.photo;
                if(img.length>100){
                    return  this.form.photo
                }else{
                    return `img/profile/${this.form.photo}`
                }
            }
        },
         created() {
         //axios.get('/editProfile').then(({ data }) => (this.form.fill(data)));//by this we are fillin the forum in profile page

            /*  Fire.$on('3awd',() =>{
         axios.get('api/profile').then(({ data }) => (this.form.fill(data)));//by this we are fillin the forum in profile page
            }); */
        },
        watch:{
            $route(to,from){
                this.getAllInfos();
            }
        }
}
</script>
<style scoped>

</style>
