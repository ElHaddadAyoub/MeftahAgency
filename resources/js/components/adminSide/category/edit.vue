<template>
    <div class="container">
            <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Update Category  {{this.$route.params.categoryid}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Category</li>
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
                <h3 class="card-title">Update Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" @submit.prevent="editCategory()">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                      <input type="text" v-model="form.title" class="form-control" id="" name="title" placeholder="Title" :class="{ 'is-invalid': form.errors.has('title') }">
                      <has-error :form="form" field="title"></has-error>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3"  class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" v-model="form.bio"  name="bio" placeholder="description" :class="{ 'is-invalid': form.errors.has('bio') }"></textarea>
                    <has-error :form="form" field="bio"></has-error>

                    </div>
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
        name:"ajouter"
         return {
             form: new Form({
                    id:'',
                    title: '',
                    bio: '',
                    avatar: ''
             })
         }
    },
    mounted(){
            axios.get(`/editcategory/${this.$route.params.categoryid}`)
            .then((response)=>{
                this.form.fill(response.data.category)//had category lihna jaya mn lif controller fossst json
            })
    },
    methods:{
        editCategory(){
            //this.$Progress.start();
            this.form.post(`/updateC/${this.$route.params.categoryid}`)
            .then((response)=>{
                //afficheCategory()
                //this.$Progress.finish();
                this.$router.push('/Listcategory');// routeur a la page des list des catagorie
                toast.fire({
                    icon: 'success',
                    title: 'Category updated successfully'
                })
            })
            .catch(()=>{
                   // this.$Progress.fail();
            })
        },
               afficheCategory() {
                    //if(this.$gate.isAdmin()){

                    axios.get("/getcat")
                    .then(() => {});
                //}
               // axios.get('api/user').then(({ data }) => (this.users = data.data));
            },
    }
}
</script>
