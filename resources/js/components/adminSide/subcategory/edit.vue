<template>
    <div class="container">
            <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Update Subcategory  {{this.$route.params.subcategoryid}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Subcategory</li>
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
                <h3 class="card-title">Update Subcategory</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form" enctype="multipart/form-data" @submit.prevent="updateArticle()">
                      <div class="card-body">
                                <div class="form-group">
                                    <label for="postId">title </label>
                                    <input type="text" class="form-control" id="postId" placeholder="Add New Post" v-model="form.title" name="title" :class="{ 'is-invalid': form.errors.has('title') }">
                                    <has-error :form="form" field="title"></has-error>
                                </div>
                                <div class="form-group">
                                    <label for="descriptionId">Add  Description</label>

                                <textarea class="form-control" v-model="form.description"  name="description" placeholder="description" :class="{ 'is-invalid': form.errors.has('description') }"></textarea>

                                    <has-error :form="form" field="description"></has-error>
                                </div>

                                <div class="form-group" >
                                    <label>Category</label>
                                    <select class="form-control" :class="{ 'is-invalid': form.errors.has('category_id') }" v-model="form.category_id">
                                        <option disabled value="">Select One</option>
                                        <option :value="category.id" v-for="category in getallCategory">{{category.title}}</option>

                                    </select>
                                    <has-error :form="form" field="cat_id"></has-error>
                                </div>
                                <div class="form-group" >
                                    <input @change = "changePhoto($event)" name="avatar" type="file" :class="{ 'is-invalid': form.errors.has('avatar') }">
                                    <img :src="updateImage()" alt="" width="80" height="80">
                                    <has-error :form="form" field="avatar"></has-error>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
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
        name:"editer"
         return {
             form: new Form({
                    id:'',
                    title: '',
                    description: '',
                    avatar: '',
                    category_id: '',
             })
         }
    },
 mounted() {

           this.$store.dispatch("allCategory");
            axios.get(`/editSubcategory/${this.$route.params.subcategoryid}`)//had articleid jaya mn route
            .then((response)=>{
                this.form.fill(response.data.subcategory)//had category lihna jaya mn lif controller fossst json
            })
        },
    computed:{
        getallCategory(){
            //return this.$store.getters.getCategory;
                return this.$store.getters.getCategory
           },

        },
    methods:{
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
                        this.form.avatar = event.target.result
                        //console.log(event.target.result)
                    };
                    reader.readAsDataURL(file);
                }
            },
        updateArticle(){
            //this.$Progress.start();
            this.form.post(`/updateSubcategory/${this.$route.params.subcategoryid}`)
            .then((response)=>{
                //afficheCategory()
                //this.$Progress.finish();
                this.$router.push('/Listsubcategory');// routeur a la page des list des catagorie
                toast.fire({
                    icon: 'success',
                    title: 'Subcategory updated successfully'
                })
            })
            .catch(()=>{
                   // this.$Progress.fail();
            })
        },
                   updateImage(){
                let img = this.form.avatar;
                if(img.length>100){
                    return  this.form.avatar
                }else{
                    return `img/subcategoryImage/${this.form.avatar}`
                }
            }
    }
}
</script>
