<template>
    <div class="container">
            <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add New SubCategory</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Subcategory</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
  <div class="row justify-content-around">
          <div class="col-md-12">


              <!-- /.card-header -->
        <div class="card card-info">
        <div class="card-header">
        <h3 class="card-title">Add New Subcategory</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" @submit.prevent="addSubcategory()">
        <div class="card-body">
            <div class="form-group">
            <label for="">Title</label>

                <input type="text" v-model="form.title" class="form-control" id="" name="title" placeholder="Title" :class="{ 'is-invalid': form.errors.has('title') }">
                <has-error :form="form" field="title"></has-error>

            </div>
            <div class="form-group">
            <label>Description</label>

            <textarea class="form-control" v-model="form.description"  name="description" placeholder="description" :class="{ 'is-invalid': form.errors.has('description') }"></textarea>
            <has-error :form="form" field="description"></has-error>

            </div>
            <div class="form-group">
                <label>Category</label>
                <select  class="form-control" v-model="form.category_id">
                    <option value="" disabled>Select Category</option>
                    <option :value="art.id" v-for="art in getallCategory" >{{ art.title }}</option>

                </select>
                <has-error :form="form" field="category_id"></has-error>

            </div>
           <div class="form-group">
                    <label for="exampleInputFile">Photo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="photo" class="custom-file-input" @change="loadphoto" id="exampleInputFile" :class="{ 'is-invalid': form.errors.has('photo') }">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>

                    </div>
                    <img :src="form.avatar" alt="" width="80" height="100" style="margin:30px;">
                    <has-error :form="form" field="avatar"></has-error>

                  </div>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-info" style="color:#fff;">Add</button>
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
                    description: '',
                    avatar: '',
                    category_id: '',

             })
         }
    },
    mounted() {
           //this.$store.state;///("allCategory");
           //this.$store.dispatch("allArticle");
            //getallCategory();

           this.$store.dispatch("allCategory");
        },
    computed:{
        getallCategory(){
            //return this.$store.getters.getCategory;
                return this.$store.getters.getCategory
           }
        },
    methods:{
        loadphoto(event){
            let file = event.target.files[0];
            if(file.size>3048576){
                swal.fire({
                icon: 'error',
                title: 'Choose File min than 1MB',
                text: 'Something went wrong!'
                })
            }else{
                let reader = new FileReader();
                reader.onload = event => {
                // The file's text will be printed here
                this.form.avatar = event.target.result
                };
                reader.readAsDataURL(file)
            }

        },
        addSubcategory(){
            //this.$Progress.start();
            this.form.post('/addSubcategory')
            .then((response)=>{
                //afficheCategory()
                //this.$Progress.finish();
                this.$router.push('/Listsubcategory');// routeur a la page des list des catagorie
                toast.fire({
                    icon: 'success',
                    title: 'Subcategory added successfully'
                })
            })
            .catch(()=>{
                   // this.$Progress.fail();
            })
        },
    }
}
</script>
