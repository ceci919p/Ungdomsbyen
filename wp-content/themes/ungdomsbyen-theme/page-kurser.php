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
				
				<img src="" alt="">
				<h2></h2>
				<hr>
				<p class="malgruppe"></p>
                <p class="fag"></p>
				<hr>
				<p class="kortbeskrivelse"></p>
				<button class="detaljer">Læs mere</button>
				
			</article>
		</template>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<h1 id="overskrift">Alle vores kurser og workshops</h1>
			<p id="seo_tekst">Find et kursus eller workshop her. Vi sætter fokus på alt fra LGBT og normer, valg af uddannelse, FN’s 17 verdensmål, økonomi, demokrati og medborgerskab, konflikthåndtering mm. Kurserne findes både til elever i folkeskole, grundskole, ungdomsuddannelse samt til kommunen og undervisere og ledere. Vi ligger placeret på Nørrebro i København, men kører ud til hele landet. Vi tilbyder også online kurser. </p>
			
			 <!--filtreringsknap med data attribut-->
			
			<nav id="filtrering">
				<h4>Uddannelsesniveau:</h4>
				<button data-kursus="alle">Alle</button>

				<!--<h5 class="niveau-overskrift">niveau</h5>-->
				<!--<h5 class="tema-overskrift">tema</h5>-->
				
			</nav>
			 <nav id="tema-filtrering">
				 <h4>Temaer:</h4>
				<button data-tema="alle">Alle</button>
			</nav>

			<section id="kursus-oversigt"></section>

		</main><!-- #main -->
		

		<script>
		console.log("Hip Hurra");

		let kurser;
		let niveauer;
		let temaer;
		
		//variabel der holder styr på hvilken kategori der er blevet valgt.
		let filterKursus = "alle";
		let filterTema = "alle";

		document.addEventListener("DOMContentLoaded", start);

		function start() {
			getJson();
		}

		const url = "http://ceciliejasmin.dk/kea/09_cms/ungdomsbyen/wordpress/wp-json/wp/v2/kursus/";
		const niveauUrl = "http://ceciliejasmin.dk/kea/09_cms/ungdomsbyen/wordpress/wp-json/wp/v2/niveau";
		const temaUrl = "http://ceciliejasmin.dk/kea/09_cms/ungdomsbyen/wordpress/wp-json/wp/v2/tema";
		// hente forskellige categories ind 

		async function getJson() {
			
			const data = await fetch(url);
			kurser = await data.json();
			
			const niveauData = await fetch(niveauUrl);
			niveauer = await niveauData.json();
			
			const temaData = await fetch(temaUrl);
			temaer = await temaData.json();

			console.log("henterData");
	
			//kald til funktionen visKurser
			visKurser();
			//kald til funktionen opretknapper
			opretknapper();
		}

		function opretknapper () {
			niveauer.forEach(niveau =>{
				
				//lav en funktion der opretter knapper med kategori id som data attribut
				document.querySelector("#filtrering").innerHTML += `<button class="filter" data-kursus="${niveau.id}">${niveau.name}</button>`
				
				console.log("niveauknap")
			})
			temaer.forEach(tema =>{
				
				//lav en funktion der opretter knapper med kategori id som data attribut
				document.querySelector("#tema-filtrering").innerHTML += `<button class="filter" data-tema="${tema.id}">${tema.name}</button>`
				
				console.log("temaknap");
			})
			addEventListenersToButtons();
		}

		function addEventListenersToButtons(){
			console.log("addEventListenerToButtons")
			//vælg alle filtreringsknapper og for hvert element skal der tilføjes en EventListener.
			document.querySelectorAll("#filtrering button").forEach(elm => {
				elm.addEventListener("click", filtrering);
			})
			document.querySelectorAll("#tema-filtrering button").forEach(elm => {
				elm.addEventListener("click", filtreringTema)
			})
			
		}
		//funktion til filtrering
		function filtrering(){
			//variablen der holder styr på hvilken kategori der er blevet valgt er let filterKursus.
			//vi definerer at variblen er den der lige er blevet klikket på med "this". 
			//når vi vil have fat i data-attribut bruges dataset og efterfølgende hvad data-attributten hedder 
			filterKursus = this.dataset.kursus;
			//fjerner .valgt fra alle
			document.querySelectorAll("#filtrering button").forEach(elm => {
				elm.classList.remove("valgt");
			});
			//tilføjer .valgt til den valgte 
			this.classList.add("valgt");
			console.log("filtrering");

			visKurser();
		}
		function filtreringTema(){
			filterTema = this.dataset.tema;
			//fjerner .valgt fra alle
			document.querySelectorAll("#tema-filtrering button").forEach(elm => {
				elm.classList.remove("valgt");
			})
			//tilføjer .valgt til den valgte
			this.classList.add("valgt");
			console.log(filterTema);
			visKurser();
		}

		function visKurser () {
			console.log("visKurser");
			
			const liste = document.querySelector("#kursus-oversigt");
			const skabelon = document.querySelector("template");
			liste.textContent = "";
			kurser.forEach(kursus => {
				//Hvis arrayet viser tal skal filterKursus også skal laves om til tal. Dette gøres med parseInt() - så det ville hedde (parseInt(filterRet)). I mit tilfælde havde jeg tekst og derfor skulle filterRet forblive tekst.
				console.log(temaer);
				if ((filterKursus == "alle" || kursus.niveau.includes(parseInt(filterKursus))) && (filterTema == "alle" || kursus.tema.includes(parseInt(filterTema)))) {
				const klon = skabelon.cloneNode(true).content;
				klon.querySelector("h2").textContent = kursus.title.rendered;
				klon.querySelector(".malgruppe").textContent = "Til: " + kursus.malgrupper;
				klon.querySelector(".fag").innerHTML = "Fag: " + kursus.fag;
				klon.querySelector("img").src = kursus.billede.guid;
				klon.querySelector(".kortbeskrivelse").textContent =
              		kursus.kort_beskriv;
				// klon.querySelector(".detaljer").addEventListener("click", () => {
				// 	location.href = kursus.link; })
					klon.querySelector(".detaljer").addEventListener("click", () => {
					location.href = `http://ceciliejasmin.dk/kea/09_cms/ungdomsbyen/wordpress/single?id=${kursus.id}`; })
				liste.appendChild(klon);

				}
			})

		}

		</script>
		
	</div><!-- #primary -->

<?php
get_footer();
