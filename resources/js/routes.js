//partie Admin (les route de l'admin)
import adminhome from './components/adminSide/adminhome.vue'
import dashboard from './components/adminSide/dashboard.vue';
import listcategory from './components/adminSide/category/list.vue'
import addcategory from './components/adminSide/category/ajouter.vue'
import editcategory from './components/adminSide/category/edit.vue'


import listarticle from './components/adminSide/article/listArticle.vue'
import addArticles from './components/adminSide/article/ajouter.vue'
import editArticle from './components/adminSide/article/editer.vue'
import add from './components/adminSide/article/AddArticle.vue';


import listsubcategory from './components/adminSide/subcategory/list.vue'
import addsubcategory from './components/adminSide/subcategory/ajouter.vue'
import editsubcategory from './components/adminSide/subcategory/edit.vue'

import listusers from './components/adminSide/users/list.vue'
import addUsers from './components/adminSide/users/ajouter.vue'
import edituser from './components/adminSide/users/edit.vue'


import map from './components/adminSide/map/mapTest.vue';

import login from './components/publicSide/login.vue'
import homepublic from './components/publicSide/homepublic.vue';
//partie Public (les route de Public)
import allrticles from './components/publicSide/article/AllArticle.vue';
import solorticle from './components/publicSide/article/SoloArticle.vue';
import sidearticle from './components/publicSide/article/ArticleBar.vue';
import ajouterAnnonce from './components/publicSide/article/ajouterAnnonce.vue';
import espaceuser from './components/publicSide/espace/MainEspace.vue';
import editerAnnonce from './components/publicSide/espace/EditAnnonce.vue';
import allblog from './components/publicSide/blog/allBlog.vue';
import ajouterblog from './components/publicSide/blog/ajouterblog.vue';
import soloBlog from './components/publicSide/blog/soloBlog.vue';
import listblog from './components/adminSide/blog/listblog.vue';

export const routes = [
    {
        path:'/listblog',
        component:listblog,
    },
    {
        path:'/soloBlog/:blogid',
        component:soloBlog,
    },
    {
        path:'/ajouterblog',
        component:ajouterblog,
    },
    {
        path:'/blog',
        component:allblog,
    },
    {
        path: '/dashboard',
        component:dashboard,
        name: 'admin',
    },
    {
        path: '/addArticlee',
        component:add
    },
    {
        path:'/EditAnnonce/:idAnnonce',
        component:editerAnnonce,
    },
    {
        path: '/EspaceUser',
        component: espaceuser,
    },
    {
        path: '/ajouterAnnonce',
        component:ajouterAnnonce
    },

//parte Login
{
    path:'/loginUser',
    component:login
},



//Partie Admin


    {
        path:'/Listcategory',
        component:listcategory
    },
    {
        path:'/Addcategory',
        component:addcategory
    },
    {
        path:'/EditCategory/:categoryid',
        component:editcategory
    },


    {
        path:'/ListArticle',
        component:listarticle
    },
    {
        path:'/AddArticle',
        component:addArticles
    },
    {
        path:'/EditArticle/:articleid',
        component:editArticle
    },


    {
        path:'/Listsubcategory',
        component:listsubcategory
    },
    {
        path:'/AddSubcategory',
        component:addsubcategory
    },
    {
        path:'/EditSubcategory/:subcategoryid',
        component:editsubcategory
    },


    {
        path:'/ListUsers',
        component:listusers
    },

    {
        path:'/AddUser',
        component:addUsers
    },
    {
        path:'/Edituser/:userid',
        component:edituser
    },


    {
        path:'/map',
        component:map
    },


    //Fin Partie Admin


    //Partie Public
    {
        path:'/',
        component:homepublic,
        name: 'public',
    },
    {
        path:'/allArticles',
        component:allrticles
    },
    {
        path:'/soloArticle/:articleid',
        component:solorticle
    },
    {
        path:'/sideArticle',
        component:sidearticle
    },
    {
        path:'/articleOfCat/:id',
        component:allrticles
    },
    {
        path:'/articleOfRegion/:id',
        component:allrticles
    },
    {
        path:'/articleofVille/:ville',
        component:allrticles
    },
    {
        path:'/articleofsubcategory/:subcategory',
        component:allrticles
    },
    {
        path:'/articleofVilleSub/:ville/:subcategory/:prix_min/:prix_max',
        component:allrticles

    },

]
