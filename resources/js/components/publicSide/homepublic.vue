
<template>
    <div>

        <section class="presentation">
				<div class="introduction">
					<div class="intro-text ">
						<h1>Tout l'immobilier au Maroc en vente ou location!</h1>
						<p>
							Des biens immobiliers  à découvrir partout au Maroc
						</p>
					</div>
					<div class="cta">
                        <router-link class="cta-select" to="/allArticles">Voir Annonces</router-link>
						<!-- <button class="cta-select" @change="toArticles">Voir Annonces</button> -->

					</div>
				</div>
				<div class="cover">
					<img src="img/cover2.jpg" alt="cover" />
				</div>
			</section>
       
            <div id="des" data-aos="fade-up">
                <div class="text-center">
                    <h5 class="title1">Des biens immobiliers  à découvrir<br> partout au Maroc</h5>
                </div>
            </div>
              <div class="suscribe-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs=12">
                            <div class="suscribe-text text-center">
                            <h3 >Bienvenue dans notre entreprise Meftah-Agency</h3>
                            </div>
                            </div>
                        </div>
                    </div>
            </div>
           <div class="container">
       

    

               <br>
        <div class="row" data-aos="fade-up">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>À propos de Meftah-Agency</h2>
            </div>
          </div>
        </div>
        <div class="row" data-aos="fade-up">
          <!-- single-well start-->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="well-left">
              <div class="single-well">
                <a href="#">
                  <img src="assets/img/about/1.jpg" alt="">
                </a>
              </div>
            </div>
          </div>
          <!-- single-well end-->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="well-middle">
              <div class="single-well">
                <a href="#">
                  <h4 class="sec-head">a propos de nous</h4>
                </a>
                <p>
                  Meftah est le site n°1 d'achat et de vente de biens immobiliers et de services au Maroc. Meftah Immobilier Neuf est un nouvel espace qui propose des projets d’immobiliers neufs finis ou en construction à Casablanca, Marrakech, Rabat et presque toutes les grandes villes au Maroc. Les meilleurs promoteurs et agences immobilières proposent une large sélection d'appartements neufs, des maisons neuves et des villas luxueuses à prix intéressants sur Avito Immobilier Neuf.
                </p>
         
              </div>
            </div>
          </div>
          
          <!-- End col-->
        </div>
        
      <div class="row" data-aos="fade-up">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Contactez-Nous</h2>
            </div>
          </div>
        </div>
        <div id="contact-form" class="contact-form">
		<form class="form"  @submit.prevent="addContact()">
			<input required name="name" v-model="form.name" placeholder="Name" type="text"  autocomplete="off" required>
			<input required name="email" v-model="form.email" placeholder="E-mail" type="email" autocomplete="off" required>
			<textarea name="message" v-model="form.message" rows="4" placeholder="Message"></textarea>
		   <button type="submit" class="button">Envoyer</button>
		</form>
	</div>
      </div>

    </div>
</template>

<script>
//import { KinesisContainer, KinesisElement} from 'vue-kinesis'
    export default {
        name: "PublicHome",
          data() {
        name:"ajouter"
         return {
             
             form: new Form({
                    name:'',
                    email: '',
                    message: '',
                    

             })
         }
    },
        methods:{
            addContact(){
                this.form.post('/addContact')
                .then((response)=>{
                //afficheCategory()
                //this.$Progress.finish();
                //this.$router.push('/Listcategory');// routeur a la page des list des catagorie
                toast.fire({
                icon: 'success',
                title: 'Votre message a ete envoye'
                })
                })
                .catch(()=>{
                 //this.$Progress.fail();
                })
            },
            test($ville){
                 this.$router.push(`/articleofVille/${$ville}`);
            },
            GetPhoto(img){
                return "../img/"+img;
            },
        }
    }
</script>

<style scoped>


body {
	font-family: 'Poppins', sans-serif;
}
button {
	font-family: 'Poppins', sans-serif;
}
.contact-form {
	font-family: 16px;
	margin: 0 auto;
	max-width: 600px;
	width: 100%;
}

.contact-form .separator {
	border-bottom: solid 1px #ccc;
	margin-bottom: 15px;
}

.contact-form .form {
	display: flex;
	flex-direction: column;
	font-size: 16px;
}

.contact-form_title {
	color: #333;
	text-align: left;
	font-size: 28px;
}

.contact-form input[type="email"],
.contact-form input[type="text"],
.contact-form textarea {
	border: solid 1px #e8e8e8;
	font-family: 'Roboto', sans-serif;
	padding: 10px 7px;
	margin-bottom: 15px;
	outline: none;
}

.contact-form textarea {
	resize: none;
}

.contact-form .button {
	background: #da552f;
	border: solid 1px #da552f;
	color: white;
	cursor: pointer;
	padding: 10px 50px;
	text-align: center;
	text-transform: uppercase;
}

.contact-form .button:hover {
	background: #ea532a;
	border: solid 1px #ea532a;
}

.contact-form input[type="email"],
.contact-form input[type="text"],
.contact-form textarea,
.contact-form .button {
	font-size: 15px;
	border-radius: 3px
}

header {
	display: flex;
	width: 90%;
	height: 10vh;
	margin: auto;
	align-items: center;
}
#des{
    padding: 230px 10px;
    
    background-image:url(https://picsum.photos/200/300/?blur);
    background-position: center center;
    background-size: cover; 
    /* opacity:20; */
    
    background-blend-mode: lighten;
}
 
.title1{
    margin: 30px 85px;
    font-size: 70px;
     line-height: 90px; 
    /* display: flex; */
    /* align-items: center; */
    color:whitesmoke;
}
.logo-container,
.nav-links,
.cart {
	display: flex;
}

.logo-container {
	flex: 1;
}
.logo {
	font-weight: 400;
	margin: 5px;
}
nav {
	flex: 2;
}
.nav-links {
	justify-content: space-around;
	list-style: none;
}
.nav-link {
	color: #5f5f79;
	font-size: 18px;
	text-decoration: none;
}
.cart {
	flex: 1;
	justify-content: flex-end;
}

.presentation {
	display: flex;
	width: 90%;
	margin: auto;
	min-height: 90vh;
	align-items: center;
}
.introduction {
	flex: 1;
}
.intro-text h1 {
	font-size: 44px;
	font-weight: 500;
	background: linear-gradient(to right, #494964, #6f6f89);
	-webkit-background-clip: text;
	-webkit-text-fill-color: transparent;
}
.intro-text p {
	margin-top: 5px;
	font-size: 22px;
	color: #585772;
}
.cta {
	padding: 100px  0px 0px 0px;
}
.cta-select {
   /*  border: 2px solid #3EC1D5;

    padding:10px 10px 10px 10px;
	color: #3EC1D5;
	width: 250px;
	height: 50px;
	cursor: pointer;
    font-size: 16px; */
background: #fff none repeat scroll 0 0;
  border: 2px solid #3EC1D5;
  color: #3EC1D5;
  display: inline-block;
  font-size: 16px;
  font-weight: 700;
  margin-left: 20px;
  padding: 10px 20px;
  text-decoration: none;
  text-transform: uppercase;
  border-radius: 30px;
}

.cta-select:hover {
  background: #3EC1D5 none repeat scroll 0 0;
  border: 2px solid #fff;
  color: #fff;
}
.cta-add {
	background: #c36cbb;
	width: 150px;
	height: 50px;
	cursor: pointer;
	font-size: 16px;
	border: none;
	color: white;
	margin: 30px 0px 0px 30px;
}

.cover {
	flex: 1;
	display: flex;
	justify-content: center;
	height: 60vh;
}
.cover img {
	height: 100%;
	/* filter: drop-shadow(0px 5px 3px black); */
	animation: drop 1.5s ease;
}

.big-circle {
	position: absolute;
	top: 0px;
	right: 0px;
	z-index: -1;
	opacity: 0.5;
	height: 80%;
}
.medium-circle {
	position: absolute;
	top: 30%;
	right: 30%;
	z-index: -1;
	height: 60%;
	opacity: 0.4;
}
.small-circle {
	position: absolute;
	bottom: 0%;
	left: 20%;
	z-index: -1;
}

.laptop-select {
	width: 15%;
	display: flex;
	justify-content: space-around;
	position: absolute;
	right: 20%;
}

@keyframes drop {
	0% {
		opacity: 0;
		transform: translateY(-80px);
	}
	100% {
		opacity: 1;
		transform: translateY(0px);
	}
}

@media screen and (max-width: 1024px) {
	.presentation {
		flex-direction: column;
	}
	.introduction {
		margin-top: 5vh;
		text-align: center;
	}
	.intro-text h1 {
		font-size: 30px;
	}
	.intro-text p {
		font-size: 18px;
	}
	.cta {
		padding: 10px 0px 0px 0px;
	}
	.laptop-select {
		bottom: 5%;
		right: 50%;
		width: 50%;
		transform: translate(50%, 5%);
	}
	.cover img {
		height: 80%;
	}
	.small-circle,
	.medium-circle,
	.big-circle {
		opacity: 0.2;
	}
}
</style>
