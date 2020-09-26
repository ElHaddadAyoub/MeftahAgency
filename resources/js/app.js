
require('./bootstrap');
window.Vue = require('vue');
import Vue from 'vue'
//import '@/assets/css/tailwind.css'


//<-- VueX
import Vuex from 'vuex'
Vue.use(Vuex)
import storeData from "./store/index.js"
const store = new Vuex.Store(
    storeData
)
import Vuesax from 'vuesax'

import 'vuesax/dist/vuesax.css' //Vuesax styles
Vue.use(Vuesax, {
  // options here
})
import 'material-icons/iconfont/material-icons.css';
//End VueX -->
//Import Editor markdo...
import 'v-markdown-editor/dist/v-markdown-editor.css';
import Editor from 'v-markdown-editor'
// global register
Vue.use(Editor);
//spinner Import
import * as VueSpinnersCss from "vue-spinners-css";

Vue.use(VueSpinnersCss)
///

import SequentialEntrance from 'vue-sequential-entrance'
import 'vue-sequential-entrance/vue-sequential-entrance.css'
Vue.use(SequentialEntrance);
//import Vue from 'vue';
// Ajouter Vue Carrousel
import VueCarousel from 'vue-carousel';
Vue.use(VueCarousel);
//Vue Segestion
import VueSuggestion from 'vue-suggestion'
Vue.use(VueSuggestion)
//
import VueProgressBar from 'vue-progressbar';
import VueRouter from 'vue-router'
Vue.use(VueRouter)
//Vue component for currency
import VueCurrencyInput from 'vue-currency-input'
Vue.use(VueCurrencyInput)

Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '4px'
  })

import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
Vue.use(ElementUI);

import { Form, HasError, AlertError } from 'vform'

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

window.Form = Form;

import swal from 'sweetalert2'
window.swal = swal
const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
      toast.addEventListener('mouseenter', swal.stopTimer)
      toast.addEventListener('mouseleave', swal.resumeTimer)
    }
  })

  //Import v-select:
  import vSelect from 'vue-select'
  Vue.component('v-select', vSelect)

/*   import Buefy from 'buefy'
  import 'buefy/dist/buefy.css'

  Vue.use(Buefy) */
  import VueStar from 'vue-star'
  Vue.component('VueStar', VueStar)

  window.toast = toast
  window.Fire = new Vue();

//const Swal = require('sweetalert2')

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('admin-main', require('./components/adminSide/adminmain.vue').default);
Vue.component('public-main', require('./components/publicSide/publicMain.vue').default);
Vue.component('pagination', require('laravel-vue-pagination'));

import {routes} from './routes';//ici on  importer le fichier des routed qui existe dans routes.js pour le exucute ici
import {filter} from './filter';
const router = new VueRouter({
    routes,
    mode:'hash',
})
const search = ""
const app = new Vue({
    el: '#app',
    router,
    store,
    data:{
        search: ''
    },
    methods:{
        searchit:_.debounce(function () {
            //console.log(this.$route.path)
            if(this.$route.path == '/Listcategory'){
                //console.log('test1')
                this.$store.dispatch('chercheCategorie',this.search);
            }if(this.$route.path == '/ListArticle'){
                //console.log('test2')
                this.$store.dispatch('chercheArticleadmin',this.search);
            }if(this.$route.path == '/Listsubcategory'){
                //console.log('test3')
                this.$store.dispatch('chercheSubcategory',this.search);
            }if(this.$route.path == '/ListUsers'){
                this.$store.dispatch('chercheUser',this.search);
            }
        },1000),
    }
});
