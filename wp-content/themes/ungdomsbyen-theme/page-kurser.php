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
				<p class="malgruppe"></p>
                <p class="fag"></p>
				<p class="kortbeskrivelse"></p>
				<button class="detaljer">Læs mere</button>
				
				
			</article>
		</template>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<h1 id="overskrift">Kurser</h1>
			
			 <!--filtreringsknap med data attribut-->
			
			<nav id="filtrering">
				<h4>Uddannelsesniveau:</h4>
				<button data-kursus="alle">Alle</button>

				<!--<h5 class="niveau-overskrift">niveau</h5>-->
				<!--<h5 class="tema-overskrift">tema</h5>-->
				
			</nav>
			 <nav id="tema-filtrering">
				 <h4>Tema:</h4>
				<button data-tema="alle">Alle</button>
			</nav>

			<section id="kursus-oversigt"></section>

		</main><!-- #main -->
		

		<script>
		console.log("Hip Hurra");

		let kurser;
		let niveauer;
		let temaer;
		let alleFag;
		let malgrupper;
		//variabel der holder styr på hvilken kategori der er blevet valgt.
		let filterKursus ="alle";
		let filterTema = "alle";

		document.addEventListener("DOMContentLoaded", start);

		function start() {
			getJson();
		}

		const url = "http://ceciliejasmin.dk/kea/09_cms/ungdomsbyen/wordpress/wp-json/wp/v2/kursus";
		const niveauUrl = "http://ceciliejasmin.dk/kea/09_cms/ungdomsbyen/wordpress/wp-json/wp/v2/niveau";
		const temaUrl = "http://ceciliejasmin.dk/kea/09_cms/ungdomsbyen/wordpress/wp-json/wp/v2/tema";
		const fagUrl = "http://ceciliejasmin.dk/kea/09_cms/ungdomsbyen/wordpress/wp-json/wp/v2/fag";
		const malgruppeUrl = "http://ceciliejasmin.dk/kea/09_cms/ungdomsbyen/wordpress/wp-json/wp/v2/malgruppe";
		// hente forskellige categories ind 

		async function getJson() {
			
			const data = await fetch(url);
			kurser = await data.json();
			
			const niveauData = await fetch(niveauUrl);
			niveauer = await niveauData.json();
			
			const temaData = await fetch(temaUrl);
			temaer = await temaData.json();

			const fagData = await fetch(fagUrl);
			alleFag = await fagData.json();

			const malgruppeData = await fetch(malgruppeUrl);
			malgrupper = await malgruppeData.json();

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
				
				console.log("temaknap")
			})
			addEventListenersToButtons();
		}

		function addEventListenersToButtons(){
			//vælg alle filtreringsknapper og for hvert element skal der tilføjes en EventListener.
			document.querySelectorAll("#filtrering button").forEach(elm =>{
				elm.addEventListener("click", filtrering);
			})
			document.querySelectorAll("#tema-filtrering button").forEach(elm => {
				elm.addEventListener("click", filtreringTema)
			})
			console.log("addEventListenerToButtons")
		}
		//funktion til filtrering
		function filtrering(){
			//variablen der holder styr på hvilken kategori der er blevet valgt er let filterKursus.
			//vi definerer at variblen er den der lige er blevet klikket på med "this". 
			//når vi vil have fat i data-attribut bruges dataset og efterfølgende hvad data-attributten hedder 
			filterKursus = this.dataset.kursus;
			//fjerner .valgt fra alle
			document.querySelectorAll("#filtrering .filter").forEach(elm => {
				elm.classList.remove("valgt");
			});
			//tilføjer .valgt til den valgte 
			this.classList.add("valgt");
			console.log("filtrering");

			visKurser();
		}
		function filtreringTema(){
			filterTema = this.dataset.tema;
			document.querySelector("h1").textContent = this.textContent;
			//fjerner .valgt fra alle
			document.querySelectorAll("#tema-filtrering .filter").forEach(elm => {
				elm.classList.remove("valgt");
			})
			//tilføjer .valgt til den valgte
			this.classList.add("valgt");
			console.log("filtreringTema");
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
                klon.querySelector(".malgruppe").innerHTML = kursus.malgruppe.name;
                klon.querySelector(".fag").innerHTML = kursus.fag.name;
				klon.querySelector("img").src = kursus.billede.guid;
				klon.querySelector(".kortbeskrivelse").textContent =
              		kursus.kort_beskriv;
				klon.querySelector(".detaljer").addEventListener("click", () => {
					location.href = kursus.link; })
				
				// kurser.malgrupper.forEach(malgruppe => {
				// 	klon.querySelector("malgruppeliste").innerHTML += "<li>" + malgruppe + "</li>"
				// })	
				// kurser.allefag.forEach(fag => {
				// 	klon.querySelector("fagliste").innerHTML += "<li>" + fag + "</li>"
				// })
				liste.appendChild(klon);

				}
			})

		}

		</script>
		
	</div><!-- #primary -->

<?php
get_footer();
