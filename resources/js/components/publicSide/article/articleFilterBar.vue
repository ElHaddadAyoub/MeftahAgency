<template>
    <div id="filterbar" class="col-md-12 col-sm-12 col-xs-12">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                      <a class="navbar-brand" href="#">Affiner votre recherche :</a>

        <div class="form-group mt-4">
            <select  class="form-control" v-model="subcategory" >
                <option  value="" disabled>Type de Bien</option>
                <option  v-for="subcategory in tousSubcategory" :value="subcategory">{{subcategory }}</option>
            </select>
        </div>
        <div class="form-group mt-4">
            <select  class="form-control" v-model="ville" @change="getAnnonceByVille(ville)">
                <option  value="" disabled>Ville</option>
                <option  v-for="ville in tousVilles" :value="ville">{{ville }}</option>
            </select>
        </div>
       <div class="form-group  mt-4">
            <currency-input  id="test"  placeholder="Min. budget" v-model="prix_min" v-currency="{currency: 'MAD', locale: 'fr'}"  class="form-control"/>
        </div>
        <div class="form-group  mt-4">
            <currency-input  id="test"   placeholder="Max. budget" v-model="prix_max" v-currency="{currency: 'MAD', locale: 'fr'}"  class="form-control"/>
        </div>
    <button type="submit"  class="btn btn-info mt-2"  @click.prevent="filter_All(ville,subcategory,prix_min,prix_max)"><i class="fas fa-search"></i>

    </button>
                </nav>
            </div>
        </div>
    </div>
</template>
<style scoped>
    select{
        width: 150px;
        margin: 12px 12px;
    }
    #test{
        width: 150px;
        margin: 12px 12px;
    }
    #filterbar{
/*
        padding: 140px 40px;
        background: url('/public/img/cover.jpg') center center;
        background-position: center center;
        background-size: cover; */
    }
</style>
<script>
import 'vue-select/dist/vue-select.css';
//import SpinnerLoader from '@bit/joshk.vue-spinners-css.spinner-loader';

export default {

        data(){
            return{
                ville:'',
                subcategory:'',
                prix_min:'',
                prix_max:''
            }
        },
        mounted() {
            //this.$store.dispatch('gettousCategories')
            //this.$store.dispatch("dernierArticles")
            //this.$store.dispatch("getAllRegionforAnn")
            //this.soloPostarticle();
            this.$store.dispatch("getAllvilles");
            this.$store.dispatch("getAllSubcategory");
        },
        computed:{
            tousVilles(){
                return this.$store.getters.gettousVilles
            },
            tousSubcategory(){
                return this.$store.getters.gettousSubcategory
            },

        },
        methods:{
            filter_All($ville,$subcategory,$prix_min,$prix_max){

                if(this.prix_max){

                this.$router.push(`/articleofVilleSub/${$ville}/${$subcategory}/${$prix_min}/${$prix_max}`);
                this.prix_max = null;
                this.prix_min = null;
                this.subcategory= null;
                this.ville = null;
                }else{
                         swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'les inputs sont inacomplie! ',
                        })
                    }



            },
            getAnnonceByVille($ville){
                this.$router.push(`/articleofVille/${$ville}`);
            },
            getAnnonceBysubcategory($subcategory){
                this.$router.push(`/articleofsubcategory/${$subcategory}`);
            },
        },
}
</script>
