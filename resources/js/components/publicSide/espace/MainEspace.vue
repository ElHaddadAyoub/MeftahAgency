<style scoped>

</style>

<template>
<div class="container" onload="testAuth">
    <div class="text-center"><h2>Espace utilisateur</h2></div>
  <div class="row">
  <div class="col-4">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Mes Annonces</a>
      <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Mon Profile</a>
      <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Mes favoirs</a>
      <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-one" role="tab" aria-controls="messages">Mes blogs</a>
    </div>
  </div>
  <div class="col-8">
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list"><Annonces/></div>
      <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list"><profile/></div>
      <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list"><favoris/></div>
       <div class="tab-pane fade" id="list-one" role="tabpanel" aria-labelledby="list-one-list"><blog/></div>
     
    </div>
  </div>
</div>
</div>

</template>
<script>
import Annonces from './Annonces.vue';
import profile from './profile.vue';
import favoris from './favoris.vue';
import blog from './blogg.vue';

export default {
    components:{
            Annonces,
            profile,
            favoris,
            blog
    },
    mounted(){
        // console.log('page not authorized :'. error.response.state);
        // console.log(response.status);
    },
     
    computed:{
    //  testAuth(){
    //             if(error.response.state == 401) {
    //             //store.commit("logout");
    //             //router.push("/login");
    //             console.log('page not authorized !');
    //             }
    //     }
    },
    methods:{
    //     testAuth(){
    //             if (error.response.state == 401) {
    //             //store.commit("logout");
    //             //router.push("/login");
    //             console.log('page not authorized !');
    //             }
    //     }
    // }
   
}
}
</script>
