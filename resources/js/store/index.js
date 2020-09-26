
import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

const debug = process.env.NODE_ENV !== 'production';

export default {
    //namespaces:true,
    state:{
        //cat: {},
        //catMeta: {},
        category:[],
        article:[],
        subcategory:[],
        users:[],
        postArticle:[],
        solopostarticle:[],
        tousCategories:[],
        dernierArticle:[],
        annonceParUser: [],
        blogPerUser: [],
        favorisParUser: [],
        userProfile:[],
        regions:[],
        tousregion:[],
        tousVilles:[],
        tousSubcategory:[],
        countArticles:[],
        blog:[],
    },
    getters:{
        getAllBlog(state){
            return state.blog;
        },
        getCountArticle(state){
            return state.countArticles;
        },
        gettousSubcategory(state){
            return state.tousSubcategory;
        },
        gettousVilles(state){
            return state.tousVilles;
        },
        gettousregion(state){
            return state.tousregion;
        },
        getRegion(state){
            return state.regions;
        },
        getUserprofile(state){
            return state.userProfile;
        },
        getannonce(state){
            return state.annonceParUser;
        },
        getblog(state){
            return state.blogPerUser;
        },
        getFavoris(state){
            return state.favorisParUser;
        },
        getCategory(state){
            return state.category
        },
        getArticle(state){
            return state.article
        },
        getsubcategory(state){
            return state.subcategory
        },
        getusers(state){
            return state.users
        },
         getpostarticle(state){
            return state.postArticle
        },
        solopostarticle(state){
            return state.solopostarticle
        },
        soloblog(state){
            return state.blog
        },
        tousCategories(state){
            return state.tousCategories
        },
        dernierArticle(state){
            return state.dernierArticle
        }

    },
    actions:{
        allBlog(context){
            axios.get('/allblog')
            .then(response => {
                context.commit('blogs',response.data.blog);
            })

        },
        getCountArticle(context){
            axios.get('/countArticle')
            .then(response => {
                context.commit('countArticle',response.data.countArticle);
            })
        },
        getAllSubcategory(context){
            axios.get('/subcategories')
            .then(response=> {
                    context.commit('SubAnn',response.data.subcategories);
            })
        },
        getAllvilles(context){
            axios.get('/villes')
            .then(response=> {
                    context.commit('villeAnn',response.data.villes);
            })
        },
        getAllRegionforAnn(context){
            axios.get('/regionsForAnn')
            .then(response => {
                context.commit('regionAnn', response.data.region)
            });
        },
        getAllregion(context){
            axios.get('/regions')
            .then(response =>{
                context.commit('setRegion', response.data.regions)
            });
        },
        GetCategory(context){
            axios.get('/category')
            .then(response => {
                context.commit('setCategory', response.data);
            });
        },
        allCategory(context){
            axios.get('/category')
            .then((response)=>{
                context.commit('categoreis',response.data.categories)
            })
        },
        async touslesArticle({commit}){
            return commit('setArticles', await axios.get('/postarticles'))
        },
        allArticle(context){
            axios.get('/article')
            .then((response)=>{
                context.commit('articl',response.data.articles)
            })
        },
        allSubcategory(context){
            axios.get('/subcategory')//hadi katjib data mn Web
            .then((response)=>{
                context.commit('subcategor',response.data.subcategory)
            })
        },
        allUsers(context){
            axios.get('/users')//hadi katjib data mn Web
            .then((response)=>{
                context.commit('userr',response.data.users)
            })
        },
        allpostArticles(context){
            axios.get('/postarticles')
            .then((response)=>{
                if(response.data.postarticles.length){
                    context.commit('postarticlee',response.data.postarticles)
                }
                
                
            })
        },
        getsolopostarticle(context,payload){
            axios.get('/postarticlesbyid/'+payload)
            .then((response)=>{
                context.commit('soloArticle',response.data.postarticle)
            })
        },
        getsoloblog(context,payload){
            axios.get('/blogByid/'+payload)
            .then((response)=>{
                context.commit('soloBlog',response.data.blog)
            })
        },
        gettousCategories(context){
            axios.get('/categories')
            .then((response)=>{
                context.commit('tousCategories',response.data.categories)
            })
        },
        allArticlesByCat(context,payload){
            axios.get('/articleByCat/'+payload)
            .then((response)=>{
                context.commit('articleByCat',response.data.postarticles)
            })
        },
        getArticlesByReg(context,payload){
            axios.get('/articleByReg/'+payload)
            .then((response)=>{
                context.commit('articleByReg',response.data.postarticles)
            })
        },
        getArticlesByVille(context,payload){
            axios.get('/articleByVille/'+payload)
            .then((response)=>{
                context.commit('articleByVille',response.data.postarticles)
            })
        },
        getArticlesBySubcategory(context,payload){
            axios.get('/articleBySubcategory/'+payload)
            .then((response)=>{
                context.commit('articleBySubcategory',response.data.postarticles)
            })
        },
        getArticlesByVilleSub(context,payload){
            axios.get('/articleByVilleSubcategory/'+payload)
            .then((response)=>{
                context.commit('articleByVilleSubcategory',response.data.postarticles)
            })
        },
        chercheArticle(context,payload){
            axios.get('/chercheArticle?c='+payload)
            .then((response)=>{
                context.commit('getchercheArticle',response.data.articles)
            })
        },
        chercheCategorie(context,payload){
            axios.get('/chercheCategorie?c='+payload)
            .then((response)=>{
                context.commit('getchercheCategorie',response.data.categories)
            })
        },
        chercheArticleadmin(context,payload){
            axios.get('/chercheArticleadmin?c='+payload)
            .then((response)=>{
                context.commit('getchercheArticleadmin',response.data.articles)
            })
        },
        chercheSubcategory(context,payload){
            axios.get('/chercheSubcategory?c='+payload)
            .then((response)=>{
                context.commit('getchercheSubcategory',response.data.subcategory)
            })
        },
        chercheUser(context,payload){
            axios.get('/chercheUser?c='+payload)
            .then((response)=>{
                context.commit('getchercheUser',response.data.users)
            })
        },
        dernierArticles(context){
            axios.get('/dernierarticles')
            .then((response)=>{
                context.commit('dernierArticles',response.data.postarticles)
            })
        },
        allannonces(context){
            axios.get('/annonceParUser')
            .then((response)=>{
                context.commit('annoncesparuser',response.data.annonces);
            })
        },
        allblogs(context){
            axios.get('/blogParUser')
            .then((response)=>{
                context.commit('blogparuser',response.data.blogs);
            })
        },
        allFavoris(context){
            axios.get('/FavorisParUser')
            .then((response)=>{
                context.commit('favorisparuser',response.data.favoris);
            })
        },
        getUserProfile(context){
            axios.get('/UserProfile')
            .then(response=>{
                context.commit('userProfile', response.data.userr);
            });
        },

    },
    mutations:{


        setArticles(state, response){
            state.postArticle = response.data.data;
        },
        categoreis(state,data){
            return state.category = data
        },
       articl(state,payload){
            return state.article = payload;
        },
        subcategor(state,payload){
            return state.subcategory = payload
        },
        userr(state,payload){
            return state.users = payload
        },
        postarticlee(state,payload){
            return state.postArticle = payload
        },
        soloArticle(state,payload){
            return state.solopostarticle = payload
        },
        soloBlog(state,payload){
            return state.blog = payload
        },
        tousCategories(state,payload){
            return state.tousCategories = payload
        },
        articleByCat(state,payload){
             state.postArticle = payload
        },
        articleByReg(state,payload){
            state.postArticle = payload
       },
       articleByVille(state,payload){
            state.postArticle = payload
       },
       articleBySubcategory(state,payload){
            state.postArticle = payload
       },
       articleByVilleSubcategory(state,payload){
            state.postArticle = payload
       },
        getchercheArticle(state,payload){
            state.postArticle = payload
        },
        dernierArticles(state,payload){
            state.dernierArticle = payload
        },
        regionAnn(state,payload){
            state.tousregion = payload
        },
        SubAnn(state,payload){
            state.tousSubcategory = payload
        },
        villeAnn(state,payload){
            state.tousVilles = payload
        },
        getchercheCategorie(state,payload){
            state.category = payload
        },
        getchercheArticleadmin(state,payload){
            state.article = payload
        },
        getchercheSubcategory(state,payload){
            state.subcategory = payload
        },
        getchercheUser(state,payload){
            state.users = payload
        },
        setCategory(state,data){
            state.category = data
        },
        setRegion(state,data){
            return state.regions = data
        },
        annoncesparuser(state,payload){
            state.annonceParUser = payload
        },
        blogparuser(state,payload){
            state.blogPerUser = payload
        },
        favorisparuser(state,payload){
            state.favorisParUser = payload
        },
        userProfile(state,payload){
            state.userProfile = payload
        },
        countArticle(state,payload){
            return state.countArticles = payload;
        },
        blogs(state,payload){
            return state.blog = payload;
        }

    },
    strict: false
}

