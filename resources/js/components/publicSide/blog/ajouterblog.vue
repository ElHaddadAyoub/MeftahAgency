<template>
    <div class="container">

  <div class="row justify-content-around">
          <div class="col-md-12">


              <!-- /.card-header -->
              <div class="card">
              <div class="card-header">
                <h3 class="card-title">Ajouter un nouveau Blog</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" @submit.prevent="addblog()">
                <div class="card-body">
                  <div class="form-group ">
                    <label for="" >titre</label>
                    <div >
                      <input type="text" v-model="form.title" class="form-control" id="" name="title" placeholder="titre" :class="{ 'is-invalid': form.errors.has('title') }">
                      <has-error :form="form" field="title"></has-error>
                    </div>
                  </div>

                  <div class="form-group">
                      <label for="inputPassword3"  >description</label>
                       <markdown-editor  v-model="form.description" :class="{ 'is-invalid': form.errors.has('description') }"></markdown-editor>
                       <has-error :form="form" field="description"></has-error>
                  </div>
                           <div class="form-group">
                    <label for="exampleInputFile">Photo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="photo" class="custom-file-input"  @change="loadphoto"  id="exampleInputFile" :class="{ 'is-invalid': form.errors.has('photo') }">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>

                    </div>
                    <img :src="form.photo" alt="" width="80" height="100" style="margin:30px;">
                    <has-error :form="form" field="photo"></has-error>

                  </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info" style="color:#fff;">publier</button>

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
             type: [],
             form: new Form({
                    id:'',
                    title: '',
                    description: '',
                    photo: '',

             })
         }
    },
    methods:{
             loadphoto(event){
            let file = event.target.files[0];
            if(file.size>3048576){
                swal.fire({
                icon: 'error',
                title: 'Choose File min than 3MB',
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
        addblog(){
            this.form.post('/addblog')
            .then((response)=>{
                //afficheCategory()
                //this.$Progress.finish();
                this.$router.push('/blog');// routeur a la page des list
                toast.fire({
                    icon: 'success',
                    title: 'Blog ajouter avec succes ! '
                })
            })
            .catch(()=>{
                    this.$Progress.fail();
            })
        },
    }
}
</script>
