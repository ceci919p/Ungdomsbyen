<?php
/**
 * Author:          Andrei Baicus <andrei@themeisle.com>
 * Created on:      28/08/2018
 *
 * @package Neve
 */

$container_class = apply_filters( 'neve_container_class_filter', 'container', 'single-post' );

//OBS. dette er en single.php side
get_header();

?>
	
	<!-- <div id="primary" class="content-area">
		<main id="main" class="site-main">

			<article id="single_article">
				<button class="luk">Tilbage</button>
				<section class="single_container">
							<h2></h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at nulla vel elit viverra pharetra sed et quam. Integer ipsum quam, bibendum at nibh eget, placerat hendrerit dui.. </p>
				<img class="pic" src="" alt="">

				<div class="single_text">
					<h2></h2>
				<p class="langbeskrivelse"></p>
				<p class="pris"></p>
			    </div>
			    </section>

				<section class="single_container2">
					<div class="info_box">
				    <h4>Praktiske informationer</h4>
					<p>Klassetrin</p>
					<p>Deltagere</p>
					<p>Varighed</p>
					<p>Indhold</p>
					<p>Pris</p>
				    </div>
				

				</section> -->

				

				<!-- </section>

				<section class="single_container4">
					</div>
					<div class="kontakt_info">
						<h3>Har du spørgsmål til kurset?</h3>
					</div>

				</section>
			</article> -->

		<!-- </main>#main -->
		
		<!-- <script>
			let kursus;

			const url = "http://ceciliejasmin.dk/kea/09_cms/ungdomsbyen/wordpress/wp-json/wp/v2/kursus/"+<?php echo get_the_ID() ?>;

			async function getJson() {
			const data = await fetch(url);
			kursus = await data.json();
			console.log(kursus)
			visKursus();
		}

		//vis data om kurset
		function visKursus () {
			document.querySelector("h2").textContent = kursus.title.rendered;
			document.querySelector(".pic").src = kursus.billede.guid;
			document.querySelector(".langbeskrivelse").innerHTML = kursus.beskrivelse;
			document.querySelector(".pris").innerHTML = kursus.pris + " kr";
		}

		document.querySelector(".luk").addEventListener("click", () => {
			//link tilbage til den foregående side på "luk" knappen.
			history.back();
		})

		getJson ();

		</script>
	 -->
	<!-- </div>#primary -->
<?php
get_footer();
