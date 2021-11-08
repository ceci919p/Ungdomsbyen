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
				<p class="tema"></p>
                <p class="fag"></p>
				 <p class="malgruppe"></p>
				<p class="kortbeskrivelse"></p>
				
				
			</article>
		</template>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			 <!--filtreringsknap med data attribut-->
			<nav id="filtrering">
				<button data-kursus="alle">Alle</button>
			</nav>

			<h1 id="overskrift">Kurser</h1>
			<section id="kursus-oversigt"></section>

		</main><!-- #main -->
		

		<script>
		console.log("Hip Hurra");

		let kurser;
		let categories;
		//variabel der holder styr på hvilken kategori der er blevet valgt.
		let filterKursus ="alle";

		document.addEventListener("DOMContentLoaded", start);

		function start() {
			getJson();
		}

		const url = "http://ceciliejasmin.dk/kea/09_cms/ungdomsbyen/wordpress/wp-json/wp/v2/kursus";
		const catUrl = "http://ceciliejasmin.dk/kea/09_cms/ungdomsbyen/wordpress/wp-json/wp/v2/categories";

		async function getJson() {
			
			const data = await fetch(url);
			const catdata = await fetch(catUrl);
			kurser = await data.json();
			categories = await catdata.json();

			console.log(categories);
			//kald til funktionen visKurser
			visKurser();
			//kald til funktionen opretknapper
			opretknapper();
		}

		function opretknapper () {
			categories.forEach(cat =>{
				//lav en funktion der opretter knapper med kategori id som data attribut
				document.querySelector("#filtrering").innerHTML += `<button class="filter" data-kursus="${cat.name}">${cat.name}</button>`
				
				addEventListenersToButtons();
			})
		}

		function addEventListenersToButtons(){
			//vælg alle filtreringsknapper og for hvert element skal der tilføjes en EventListener.
			document.querySelectorAll("#filtrering button").forEach(elm =>{
				elm.addEventListener("click", filtrering);
			})
		};

		//funktion til filtrering
		function filtrering(){
			//variablen der holder styr på hvilken kategori der er blevet valgt er let filterKursus.
			//vi definerer at variblen er den der lige er blevet klikket på med "this". 
			//når vi vil have fat i data-attribut bruges dataset og efterfølgende hvad data-attributten hedder 
			filterKursus = this.dataset.kursus;
			console.log(filterKursus);

			visKurser();
		}


		function visKurser () {
			console.log(kurser);
			
			const liste = document.querySelector("#kursus-oversigt");
			const skabelon = document.querySelector("template");
			liste.textContent = "";
			kurser.forEach(kursus => {
				//Hvis arrayet viser tal skal filterKursus også skal laves om til tal. Dette gøres med parseInt() - så det ville hedde (parseInt(filterRet)). I mit tilfælde havde jeg tekst og derfor skulle filterRet forblive tekst.
				console.log(kursus.categories);
				if (filterKursus == "alle" || kursus.categories.includes(filterKursus)){

				const klon = skabelon.cloneNode(true).content;
				klon.querySelector("h2").textContent = kursus.title.rendered;
                klon.querySelector(".malgruppe").textContent = kursus.malgruppe;
                klon.querySelector(".fag").innerHTML = kursus.fag;
				klon.querySelector("img").src = kursus.billede.guid;
				 klon.querySelector(".kortbeskrivelse").textContent =
              kursus.kort_beskriv;
				klon.querySelector("article").addEventListener("click", () => {
					location.href = kursus.link; })
				liste.appendChild(klon);

				}
			})

		}

		</script>
		
	</div><!-- #primary -->

<?php
get_footer();
