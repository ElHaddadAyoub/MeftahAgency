<template>
    <div class="container">
            <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add New Article</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Article</li>
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
        <h3 class="card-title">Add New Article</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" @submit.prevent="addArticle()">
        <div class="card-body">
            <div class="form-group">
            <label for="">Title</label>

                <input type="text" v-model="form.title" class="form-control" id="" name="title" placeholder="Title" :class="{ 'is-invalid': form.errors.has('title') }">
                <has-error :form="form" field="title"></has-error>

            </div>
            <div class="form-group">
            <label>Description</label>

               <markdown-editor v-model="form.description"> <textarea class="form-control" v-model="form.description"  name="description" placeholder="description" :class="{ 'is-invalid': form.errors.has('description') }"></textarea></markdown-editor>
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
                    <img :src="form.photo" alt="" width="80" height="100" style="margin:30px;">
                    <vue-dropzone ref="myVueDropzone" id="dropzone" :options="dropzoneOptions" v-on:vdropzone-sending="sendingEvent"></vue-dropzone>
                    <has-error :form="form" field="photo"></has-error>

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
import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'
export default {
        components: {
            vueDropzone: vue2Dropzone
        },
    data() {
        name:"ajouter"
        return {
             form: new Form({
                    id: '',
                    title: '',
                    description: '',
                    photo: '',
                    category_id: '',

             }),
                dropzoneOptions: {
                url: 'http://127.0.0.1:8000/api/image/upload/store',
                thumbnailWidth: 150,
                maxFilesize: 1,
                headers: { "My-Awesome-Header": "header value" },
                //autoProcessQueue: false,
                uploadMultiple: true,
                maxFiles: 5,
                addRemoveLinks: true,
                dictDefaultMessage: "<i class='fas fa-upload'></i>UPLOAD ME",
                autoProcessQueue:false
                //parallelUploads: 5
                },

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
            if(file.size>1048576){
                swal.fire({
                icon: 'error',
                title: 'Choose File min than 2MB',
                text: 'Something went wrong!'
                })
            }else{
                let reader = new FileReader();
                reader.onload = event => {
                // The file's text will be printed here
                this.form.photo = event.target.result
                };
                reader.readAsDataURL(file)
            }

        },
         addArticle(){
            this.$refs.myVueDropzone.processQueue();

        },
        sendingEvent(file, xhr, formData) {
        formData.append("title", formData.title);
        //formData.append("description",this.description);
        //formData.append("category_id",this.category_id);

      }

        /*  */

    }
}
</script>

