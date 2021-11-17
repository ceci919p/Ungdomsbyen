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

					<div class="single_wrapper">

					<div class="single_forside_billede">
					<img class="pic" src="" alt="">
				    </div> 

					<div class="info_box">
				    <h4>Praktiske informationer</h4>
					<p>Klassetrin:</p>
					<p>Antal deltagere:</p>
					<p>Varighed:</p>
					<p class="pris"></p>
				    </div>

				    </div>
					
			    </section>

				

				<section class="single_container2">

				
						<div class="single_text">
					<p class="langbeskrivelse"></p>
			    	</div>
			
						<div class="kontakt_info">
							<div class="kontakt_info_wrapper">
								<div class="kontakt_input">
							<h3>Tilmeld dig dette kursus her:</h3>
							 <form class="booking">
								 <div class="first_form">
									 <label for="fname">Fornavn:</label><br>
  									<input type="text" id="fname" name="fname"><br>
  									<label for="lname">Efternavn:</label><br>
  									<input type="text" id="lname" name="lname"><br>
									<label for="email">Email:</label><br>
  									<input type="text" id="email" name="email"><br>
								</div>
  								<div class="second_form">
									<label for="tel">Telefon-nr:</label><br>
  									<input type="tel" id="tel" name="tel"><br>
  									<label for="malgruppe">Klassetrin eller målgruppe:</label><br>
  									<input type="text" id="malgruppe" name="malgruppe"><br>
									<label for="date">Dato for workshop:</label><br>
  									<input type="date" id="date" name="date"><br>
								</div>
							</form> 
							<input type="submit" id="submit_button" name="submit_button"><br>
						</div>
						</div>
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
			document.querySelector(".pris").innerHTML = "Pris: " + kursus.pris + " kr.";
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
