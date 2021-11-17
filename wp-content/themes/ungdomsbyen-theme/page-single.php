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
//OBS. dette er en page.php side	
get_header();
?>
       	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<article id="single_article">

				<button class="luk">Tilbage</button>

				<section class="single_container">
					<h1 class="h1"></h1>
					<img class="pic" src="" alt="">
					<div class="single_text">
					<p class="langbeskrivelse"></p>
			    	</div>
			    </section>

				<section class="single_container2">
					<div class="info_box">
				    <h4>Praktiske informationer</h4>
					<p>Klassetrin:</p>
					<p>Antal deltagere:</p>
					<p>Varighed:</p>
					<p class="pris"></p>
				    </div>
				</section>

				<section class="single_container3">
					<div class="kontakt_info">
						<h3>Har du spørgsmål til kurset?</h3>
					</div>
				</section>

					<section class="single_container4">
						<div class="kontakt_info">
						<h3>Tilmeld dig dette kursus her:</h3>
							 <form>
  								<label for="fname">Fornavn:</label><br>
  								<input type="text" id="fname" name="fname"><br>
  								<label for="lname">Efternavn:</label><br>
  								<input type="text" id="lname" name="lname"><br>
								<label for="email">Email:</label><br>
  								<input type="text" id="email" name="email"><br>
								<input type="submit" id="submit_button" name="submit_button"><br>
							</form> 
					</div>
				</section>

			</article>

		</main><!-- #main -->
		
		<script>
			const urlParams = new URLSearchParams(window.location.search);
  			const id = urlParams.get("id");
			let kursus;

			const url = "http://ceciliejasmin.dk/kea/09_cms/ungdomsbyen/wordpress/wp-json/wp/v2/kursus/"+id;

			async function getJson() {
			const data = await fetch(url);
			kursus = await data.json();
			console.log(kursus)
			visKursus();
		}

		//vis data om kurset
		function visKursus () {
			document.querySelector(".h1").textContent = kursus.title.rendered;
			document.querySelector(".pic").src = kursus.billede.guid;
			document.querySelector(".langbeskrivelse").innerHTML = kursus.beskrivelse;
			document.querySelector(".pris").innerHTML = "Pris: " + kursus.pris + " kr";
		}

		document.querySelector(".luk").addEventListener("click", () => {
			//link tilbage til den foregående side på "luk" knappen.
			history.back();
		})

		getJson ();

		</script>
		
	</div><!-- #primary -->

<?php
get_footer();
