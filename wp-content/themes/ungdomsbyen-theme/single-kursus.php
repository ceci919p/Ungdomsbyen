<?php
/**
 * Author:          Andrei Baicus <andrei@themeisle.com>
 * Created on:      28/08/2018
 *
 * @package Neve
 */

$container_class = apply_filters( 'neve_container_class_filter', 'container', 'single-post' );

get_header();

?>
	
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<article>
				<button class="luk">Tilbage</button>
				<section class="single_container">
				<img class="pic" src="" alt="">

				<div class="single_text">
					<h2></h2>
				<p class="langbeskrivelse"></p>
				<p class="pris"></p>
			    </div>
			    </section>
			</article>

		</main><!-- #main -->
		
		<script>
			let kursus;

			const url = "http://ceciliejasmin.dk/kea/09_cms/ungdomsbyen/wordpress/wp-json/wp/v2/kursus"+<?php echo get_the_ID() ?>;

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
			document.querySelector(".langbeskrivelse").textContent = kursus.beskrivelse;
			document.querySelector(".pris").innerHTML = kursus.pris + " kr";
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
