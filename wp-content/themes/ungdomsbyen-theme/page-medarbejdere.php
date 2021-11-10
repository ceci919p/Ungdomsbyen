<?php
/**
 * Template Name: Page Builder Full Width (Neve)
 *
 * The template for the page builder full-width.
 *
 * It contains header, footer and 100% content width.
 *
 * @package Neve
 */
	
get_header();
?>
        <template>
			<article>
				<h2></h2>
				<img src="" alt="">
				<h3 class="titel"></h3>
				<p class="email"></p>
                <p class="telefon"></p>
				<p class="kurser"></p>
				
			</article>
		</template>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<h1 id="overskrift">Medarbejdere</h1>
			
			 <!--filtreringsknap med data attribut-->
			<section id="medarbejder-oversigt"></section>

		</main><!-- #main -->
		

		<script>
		console.log("Hip Hurra");
		let medarbejdere;
		
		
		//variabel der holder styr på hvilken kategori der er blevet valgt.

		document.addEventListener("DOMContentLoaded", start);

		function start() {
			getJson();
		}
		
		const url = "http://ceciliejasmin.dk/kea/09_cms/ungdomsbyen/wordpress/wp-json/wp/v2/medarbejder/";
		// hente forskellige categories ind 

		async function getJson() {
			
			const data = await fetch(url);
			medarbejdere = await data.json();

			console.log("henterData");
	
			//kald til funktionen visKurser
			visMedarbejdere();
		}

		

		function visMedarbejdere () {
			console.log("visMedarbejdere");
			
			const liste = document.querySelector("#medarbejder-oversigt");
			const skabelon = document.querySelector("template");
			liste.textContent = "";
			medarbejdere.forEach(medarbejder => {
				//Hvis arrayet viser tal skal filterKursus også skal laves om til tal. Dette gøres med parseInt() - så det ville hedde (parseInt(filterRet)). I mit tilfælde havde jeg tekst og derfor skulle filterRet forblive tekst.
				console.log(medarbejdere);
				const klon = skabelon.cloneNode(true).content;
				klon.querySelector("h2").textContent = medarbejder.title.rendered;
				klon.querySelector(".titel").innerHTML = medarbejder.titel;
				klon.querySelector(".email").innerHTML = medarbejder.email;
				klon.querySelector(".telefon").innerHTML = medarbejder.telefon;
				klon.querySelector(".kurser").innerHTML = medarbejder.kurser;
				klon.querySelector("img").src = medarbejder.billede.guid;
			})

		}

		</script>
		
	</div><!-- #primary -->

<?php
get_footer();
