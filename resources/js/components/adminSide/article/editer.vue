<template>
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">
                            Update Annonce

                        </h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Update Annonce
                            </li>
                        </ol>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <div class="row justify-content-around">
            <div class="col-md-12">
                <!-- /.card-header -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">editer annonce</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="col-md-12 m-3">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">titre</label>
                            <p>
                            <input
                                v-model="solopostarticle.title"
                                type="text"
                                class="form-control"
                                required
                                name="title"

                            />

                            </p>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1"
                                >Article description</label
                            >
                            <textarea
                                v-model="solopostarticle.description"
                                class="form-control"
                                id="post-content"
                                rows="3"
                                required
                            ></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Prix de Bien</label>
                            <currency-input
                                v-model="solopostarticle.prix"
                                v-currency="{ currency: 'MAD', locale: 'fr' }"
                                class="form-control"
                            />
                        </div>
                        <div class="form-group">
                            <label>region</label>
                            <select
                                class="form-control"
                                v-model="region_id"
                                @change="getAllVille"
                            >
                                <option value="" disabled
                                    >choisir la region</option
                                >
                                <option
                                    :value="region.id"
                                    v-for="region in getallregion"
                                    >{{ region.region }}</option
                                >
                            </select>
                        </div>
                        <div class="form-group">

                            <label>Ville</label>
                            <select class="form-control" v-model="ville">
                                <option value="" disabled
                                    >choisir la ville</option
                                >
                                <option
                                    :value="ville.ville"
                                    v-for="ville in villes"
                                    >{{ ville.ville }}</option
                                >
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Category</label>
                            <select
                                class="form-control"
                                v-model="category_id"
                                @change="getallSubCategory"
                            >
                                <option value="" disabled
                                    >Select Category</option
                                >
                                <option
                                    :value="art.id"
                                    v-for="art in getallCategory"
                                    >{{ art.title }}</option
                                >
                            </select>
                        </div>
                        <div class="form-group">
                            <label>SubCategory</label>
                            <select class="form-control" v-model="subcategory">
                                <option value="" disabled
                                    >Select SubCategory</option
                                >
                                <option
                                    v-for="sub in subcategories"
                                    :value="sub.title"
                                    >{{ sub.title }}</option
                                >
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Caractéristique de bien</label>
                            <div>
                                <multiselect
                                    v-model="solopostarticle.caracteristique"
                                    tag-placeholder="Ajouter"
                                    placeholder="Ajouter Caracteristique"
                                    :options="options"
                                    :multiple="true"
                                    :taggable="true"
                                    @tag="addTag"
                                ></multiselect>
                            </div>
                            <br />
                            <div class="form-group">
                                <label>Nombre de chambre</label>
                                <select
                                    v-model="solopostarticle.nb_chambre"
                                    id=""
                                    class="form-control"
                                >
                                    <option value="" disabled
                                        >Choisir nombre des chambres</option
                                    >
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Surface</label>
                                <input
                                    v-model="solopostarticle.surface"
                                    type="number"
                                    class="form-control"
                                    id=""
                                    placeholder="surface de votre bien"
                                    required
                                />
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Etat de Bien</label>
                            <select class="form-control" v-model="solopostarticle.etat">
                                <option value="" disabled
                                    >Select Etat de bien</option
                                >
                                <option value="Bon état">Bon état</option>
                                <option value="Nouveau">Nouveau</option>
                                <option value="A renover">A renover</option>
                            </select>
                        </div>

                        <label>Images</label>
                        <div class>
                            <el-upload
                                action="https://jsonplaceholder.typicode.com/posts/"
                                list-type="picture-card"
                                :on-preview="handlePictureCardPreview"
                                :on-change="updateImageList"
                                :auto-upload="false"
                            >
                                <i class="el-icon-plus"></i>
                            </el-upload>
                            <el-dialog :visible.sync="dialogVisible">
                                <img width="100%" :src="dialogImageUrl" alt />
                            </el-dialog>
                        </div>
                        <div>
                        </div>
                    </form>
                    <div class="card-footer text-center">
                            <button @click="editPost" type="submit" class="btn btn-info btn-lg" style="color:#fff">edite</button>
                    </div>



                </div>


                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</template>
<script>
import { setTimeout } from "timers";
import { mapState, mapActions } from "vuex";
import Multiselect from 'vue-multiselect';
import VueBootstrapTypeahead from 'vue-bootstrap-typeahead'
export default {
    data() {
        name: "editer";
        return {
            options: [
          'Meublé' ,'Terrasse', 'Garage', 'Ascenseur' ,'Vue sur mer', 'Salon européen', 'Climatisation' ,'Chauffage',  'Cuisine équipée', 'Four', 'Machine à laver', 'Micro-ondes',
      ],
      dialogImageUrl: "",
      dialogVisible: false,
      status_msg: "",
      status: "",
      imageList: [],
      isCreatingPost: false,
      title: "",
      citie: "",
      //item:"",
      description: "",
      category_id:"",
      subcategory:"",
      etat:"",
      ville:"",
      region_id:"",
      villes:[],
      surface:"",
      nb_chambre:"",
      prix:"",

      //regions:[],
      componentKey: 0,
      subcategories:[],
      caracteristique:[],
            // form: new Form({
            //     id: "",
            //     title: "",
            //     description: "",
            //     photo: "",
            //     category_id: ""
            // })
        };
    },
    mounted() {
        // this.$store.dispatch("allCategory");
        // axios
        //     .get(`/editArticle/${this.$route.params.articleid}`) //had articleid jaya mn route
        //     .then(response => {
        //         this.form.fill(response.data.article); //had article lihna jaya mn lif controller fossst json
        //     });

            this.$store.dispatch("allCategory");
            this.$store.dispatch("getAllregion");

            this.soloPostarticle();

    },
    computed: {

      imageListLL (){
          if(this.solopostarticle.article_images.length){
              this.dialogVisible = false;
              return this.solopostarticle.article_images;
          }
          else {
              return []
          }
      },
          getallCategory(){
                return this.$store.getters.getCategory
           },
           getallregion(){
                return this.$store.getters.getRegion
           },

        solopostarticle(){
                return this.$store.getters.solopostarticle
            }

    },
    methods: {
            getallSubCategory(){
            axios.get(`/subcategory/${this.category_id}`)
            .then(response => this.subcategories = response.data.val)
            .catch(()=>{

            })


                //return this.$store.getters.getsubcategory

           },
        getAllVille(){
                axios.get(`/ville/${this.region_id}`)
            .then(response => this.villes = response.data.val)
            .catch(()=>{

            })
           },
        soloPostarticle(){
            this.$store.dispatch('getsolopostarticle',this.$route.params.articleid);
        },
        changePhoto(event) {
            let file = event.target.files[0];
            if (file.size > 1048576) {
                swal({
                    type: "error",
                    title: "Oops...",
                    text: "Something went wrong!"
                });
            } else {
                let reader = new FileReader();
                reader.onload = event => {
                    this.form.photo = event.target.result;
                    //console.log(event.target.result)
                };
                reader.readAsDataURL(file);
            }
        },
        // updateArticle() {
        //     //this.$Progress.start();
        //     this.solopostarticle
        //         .post(`/updateArticle/${this.$route.params.articleid}`)
        //         .then((response) => {
        //             //afficheCategory()
        //             //this.$Progress.finish();
        //             this.$router.push("/ListArticle"); // routeur a la page des list des catagorie
        //             toast.fire({
        //                 icon: "success",
        //                 title: "Article updated successfully"
        //             });
        //         })
        //         .catch(() => {
        //             // this.$Progress.fail();
        //         });
        // },
        updateImage() {
            let img = this.solopostarticle.photo;
            if (img.length > 100) {
                return this.form.photo;
            } else {
                return `img/uploadimage/${this.form.photo}`;
            }
        },
        updateImageList(file) {
      this.imageList.push(file.raw);
    },
    handlePictureCardPreview(file) {
      this.dialogImageUrl = file.url;
      this.imageList.push(file);
      this.dialogVisible = true;
    },
    editPostt(){
        console.log('test');
    },
    editPost(e) {
      e.preventDefault();

    //   console.log(this.solopostarticle)
    //   if (!this.validateForm()) {
    //     return false;
    //   }
    //   const that = this;
    //   this.isCreatingPost = true;
    //   let formData = new FormData();
    //   formData.append("title", this.title);
    //   formData.append("description", this.description);
    //   formData.append("category_id", this.category_id);
    //   formData.append("subcategory", this.subcategory);
    //   formData.append("etat", this.etat);
    //   formData.append("caracteristique", this.caracteristique);
    //   formData.append("region_id", this.region_id);
    //   formData.append("ville", this.ville);
    //   formData.append("prix", this.prix);
    //   formData.append("nb_chambre", this.nb_chambre);
    //   formData.append("surface", this.surface);
    //   console.log(formData)
    let data = new FormData();
    this.imageList.forEach(function(image, key) {
        data.append(`images[${key}]`, image);
    });

    let raw_data = {dataLL: data, postKK: this.solopostarticle}
    axios.post(`/updateArticle/${this.$route.params.articleid}`, raw_data, {
        headers: { "Content-Type": `multipart/form-data; charset=utf-8; boundary=${Math.random().toString().substr(2)}` }
    })
    .then((res) => {
        console.log(res)
        // this.$router.push('/ListArticle');// routeur a la page des list des catagorie
        //     toast.fire({
        //         icon: 'success',
        //         title: 'Article updated successfully'
        //     })
    }).catch((err) => {
        console.log(err)
    })
    },
    // validateForm() {
    //   //no vaildation for images - it is needed
    //   if (!this.title) {
    //     this.status = false;
    //     this.showNotification("Post title cannot be empty");
    //     return false;
    //   }
    //   if (!this.description) {
    //     this.status = false;
    //     this.showNotification("Post body cannot be empty");
    //     return false;
    //   }
    //   return true;
    // },
    // showNotification(message) {
    //   this.status_msg = message;
    //   setTimeout(() => {
    //     this.status_msg = "";
    //   }, 3000);
    // },



    addTag (newTag) {
      const tag = {
        newTag,
        //code: newTag.substring(0, 2) + Math.floor((Math.random() * 10000000))
      }
      this.options.push(tag)
      this.caracteristique.push(tag)
    }
  },
//   watch:{
//             $route(to,from){
//                 this.soloPostarticle();
//             }
//         },
  components:{Multiselect,VueBootstrapTypeahead}
};
</script>
