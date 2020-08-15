

<template>
    <div>

        <section class="presentation">
				<div class="introduction">
					<div class="intro-text">
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
            <div class="suscribe-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs=12">
                            <div class="suscribe-text text-center">
                            <h3>Bienvenue dans notre entreprise Meftah-Agency</h3>

                            </div>
                            </div>
                        </div>
                    </div>
            </div>
           <div class="container">
                       <div class="row" data-aos="fade-up">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Emplacements populaires</h2>
            </div>
          </div>
        </div>
        <div class="row" data-aos="fade-up">

                    <div class="col-lg-4">
        <router-link to="/articleofVille/fes">

            <div class="card mb-3">
            <h3 class="card-header">Casablanca</h3>
            <img style="height: 200px; width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22318%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20318%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_158bd1d28ef%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A16pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_158bd1d28ef%22%3E%3Crect%20width%3D%22318%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22129.359375%22%20y%3D%2297.35%22%3EImage%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image">

        </div>
        </router-link>
         </div>

        <div class="col-lg-4">
            <a href="" @click.prevent="test('tanger')">
            <div class="card mb-3">
            <h3 class="card-header">Tanger</h3>
            <img style="height: 200px; width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22318%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20318%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_158bd1d28ef%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A16pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_158bd1d28ef%22%3E%3Crect%20width%3D%22318%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22129.359375%22%20y%3D%2297.35%22%3EImage%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image">
            </div>
            </a>
        </div>
        <div class="col-lg-4">
            <div class="card mb-3">
            <h3 class="card-header">Rabat</h3>
            <img style="height: 200px; width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22318%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20318%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_158bd1d28ef%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A16pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_158bd1d28ef%22%3E%3Crect%20width%3D%22318%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22129.359375%22%20y%3D%2297.35%22%3EImage%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mb-3">
            <h3 class="card-header">Kénitra</h3>
            <img style="height: 200px; width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22318%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20318%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_158bd1d28ef%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A16pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_158bd1d28ef%22%3E%3Crect%20width%3D%22318%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22129.359375%22%20y%3D%2297.35%22%3EImage%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mb-3">
            <h3 class="card-header">Marrakech</h3>
            <img style="height: 200px; width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22318%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20318%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_158bd1d28ef%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A16pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_158bd1d28ef%22%3E%3Crect%20width%3D%22318%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22129.359375%22%20y%3D%2297.35%22%3EImage%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mb-3">
            <h3 class="card-header">Agadir</h3>
            <img style="height: 200px; width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22318%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20318%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_158bd1d28ef%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A16pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_158bd1d28ef%22%3E%3Crect%20width%3D%22318%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22129.359375%22%20y%3D%2297.35%22%3EImage%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image">
            </div>
        </div>

        </div>

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
                  <h4 class="sec-head">project Maintenance</h4>
                </a>
                <p>
                  Redug Lagre dolor sit amet, consectetur adipisicing elit. Itaque quas officiis iure aspernatur sit adipisci quaerat unde at nequeRedug Lagre dolor sit amet, consectetur adipisicing elit. Itaque quas officiis iure
                </p>
                <ul>
                  <li>
                    <i class="fa fa-check orange"></i> Interior design Package
                  </li>
                  <li>
                    <i class="fa fa-check"></i> Building House
                  </li>
                  <li>
                    <i class="fa fa-check"></i> Reparing of Residentail Roof
                  </li>
                  <li>
                    <i class="fa fa-check"></i> Renovaion of Commercial Office
                  </li>
                  <li>
                    <i class="fa fa-check"></i> Make Quality Products
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <!-- End col-->
        </div>

      </div>

    </div>
</template>

<script>
//import { KinesisContainer, KinesisElement} from 'vue-kinesis'
    export default {
        name: "PublicHome",
        methods:{
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

header {
	display: flex;
	width: 90%;
	height: 10vh;
	margin: auto;
	align-items: center;
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
