<template>
<div class="container">


  <div class="card mt-4" :key="componentKey">
    <div class="card-header">Ajouter Une Annonce</div>
    <div class="card-body">
      <div
        v-if="status_msg"
        :class="{ 'alert-success': status, 'alert-danger': !status }"
        class="alert"
        role="alert"
      >{{ status_msg }}</div>
      <form>
        <div class="form-group">
          <label for="exampleFormControlInput1">Title</label>
          <input
            v-model="title" type="text" class="form-control" id="title" placeholder="Post Title" required
          />
        </div>

        <div class="form-group">
          <label for="exampleFormControlTextarea1">Article description</label>
          <textarea v-model="description" class="form-control" id="post-content" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="">Prix de Bien</label>
            <currency-input v-model="prix" v-currency="{currency: 'MAD', locale: 'fr'}"  class="form-control"/>
        </div>
        <div class="form-group">
            <label>region</label>
            <select  class="form-control" v-model="region_id" @change="getAllVille">
                <option value="" disabled>choisir la region</option>
                <option :value="region.id" v-for="region in getallregion" >{{ region.region }}</option>

            </select>


        </div>
           <div class="form-group">
            <label>Ville</label>
            <select  class="form-control" v-model="ville">
                <option value="" disabled>choisir la ville</option>
                <option :value="ville.ville" v-for="ville in villes" >{{ ville.ville }}</option>

            </select>


        </div>

        <div class="form-group">
            <label>Category</label>
            <select  class="form-control" v-model="category_id" @change="getallSubCategory">
                <option value="" disabled>Select Category</option>
                <option :value="art.id" v-for="art in getallCategory" >{{ art.title }}</option>

            </select>


        </div>
        <div class="form-group">
            <label>SubCategory</label>
            <select  class="form-control" v-model="subcategory">
                <option value="" disabled>Select SubCategory</option>
                <option  v-for="sub in subcategories" :value="sub.title">{{ sub.title }}</option>
            </select>
        </div>
          <div class="form-group">
            <label>Caractéristique de bien</label>
            <div>
                <multiselect v-model="caracteristique" tag-placeholder="Ajouter" placeholder="Ajouter Caracteristique"   :options="options" :multiple="true" :taggable="true" @tag="addTag"></multiselect>

            </div>
    <br>
            <div class="form-group">
                <label>Nombre de chambre</label>
                <select v-model="nb_chambre" id="" class="form-control">
                    <option value="" disabled>Choisir nombre des chambres</option>
                    <option  value="1">1</option>
                      <option value="2">2</option>
                        <option value="3">3</option>
                </select>
            </div>
            <div class="form-group">
                <label>Surface</label>
                <input
                    v-model="surface" type="number" class="form-control" id="" placeholder="surface de votre bien" required
          />
            </div>
        </div>
        <div class="form-group">
            <label>Etat de Bien</label>
            <select  class="form-control" v-model="etat">
                <option value="" disabled>Select Etat de bien</option>
                <option  value="Bon état">Bon état</option>
                <option  value="Nouveau">Nouveau</option>
                <option  value="A renover">A renover</option>
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
      </form>
    </div>
    <div class="card-footer">
      <button
        type="button"
        @click="createPost"
        class="btn btn-success"
      >{{ isCreatingPost ? "Posting..." : "Create Post" }}</button>
    </div>
  </div>
  </div>
</template>

<style>
.avatar-uploader .el-upload {
  border: 1px dashed #d9d9d9;
  border-radius: 6px;
  cursor: pointer;
  position: relative;
  overflow: hidden;
}
.avatar-uploader .el-upload:hover {
  border-color: #409eff;
}
.avatar-uploader-icon {
  font-size: 28px;
  color: #8c939d;
  width: 178px;
  height: 178px;
  line-height: 178px;
  text-align: center;
}
.avatar {
  width: 178px;
  height: 178px;
  display: block;
}
</style>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<script>
import { setTimeout } from "timers";
import { mapState, mapActions } from "vuex";
import Multiselect from 'vue-multiselect';
import VueBootstrapTypeahead from 'vue-bootstrap-typeahead'

//Vue.component('multiselect', Multiselect)
export default {

  name: "create-post",
  props: ["posts"],

  data() {
    return {
      options: [
          'Meublé' ,'Terrasse', 'Garage', 'Ascenseur' ,'Vue sur mer', 'Salon européen', 'Climatisation' ,'Chauffage',  'Cuisine équipée', 'Four', 'Machine à laver', 'Micro-ondes',
      ],
      dialogImageUrl: "",
      dialogVisible: false,
      imageList: [],
      status_msg: "",
      status: "",
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
    };
  },

    mounted() {
           this.$store.dispatch("allCategory");
            this.$store.dispatch("getAllregion");

        },
    computed:{
        getallCategory(){
                return this.$store.getters.getCategory
           },
           getallregion(){
                return this.$store.getters.getRegion
           },

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
    //...mapActions(["getAllPosts"]),
    updateImageList(file) {
      this.imageList.push(file.raw);
    },
    handlePictureCardPreview(file) {
      this.dialogImageUrl = file.url;
      this.imageList.push(file);
      this.dialogVisible = true;
    },
    createPost(e) {
      e.preventDefault();
      if (!this.validateForm()) {
        return false;
      }
      const that = this;
      this.isCreatingPost = true;
      let formData = new FormData();
      formData.append("title", this.title);
      formData.append("description", this.description);
      formData.append("category_id", this.category_id);
      formData.append("subcategory", this.subcategory);
      formData.append("etat", this.etat);
      formData.append("caracteristique", this.caracteristique);
      formData.append("region_id", this.region_id);
      formData.append("ville", this.ville);
      formData.append("prix", this.prix);
      formData.append("nb_chambre", this.nb_chambre);
      formData.append("surface", this.surface);
      $.each(this.imageList, function(key, image) {
        formData.append(`images[${key}]`, image);
      });
        axios.post("/addArticle", formData, {
          headers: { "Content-Type": "multipart/form-data" }
        })
        .then(res => {
            this.$router.push('/allArticles');// routeur a la page des list des catagorie
                toast.fire({
                    icon: 'success',
                    title: 'Article added successfully'
                })
        });
    },
    validateForm() {
      //no vaildation for images - it is needed
      if (!this.title) {
        this.status = false;
        this.showNotification("Post title cannot be empty");
        return false;
      }
      if (!this.description) {
        this.status = false;
        this.showNotification("Post body cannot be empty");
        return false;
      }
      return true;
    },
    showNotification(message) {
      this.status_msg = message;
      setTimeout(() => {
        this.status_msg = "";
      }, 3000);
    },
    addTag (newTag) {
      const tag = {
        newTag,
        //code: newTag.substring(0, 2) + Math.floor((Math.random() * 10000000))
      }
      this.options.push(tag)
      this.caracteristique.push(tag)
    }
  },
  components:{Multiselect,VueBootstrapTypeahead}
};
</script>
