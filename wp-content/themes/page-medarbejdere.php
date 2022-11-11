<?php
/**
 * Theme Index Section for our theme.
 *
 * @package ThemeGrill
 * @subpackage Spacious
 * @since Spacious 1.0
 */
get_header();
?>

	<main id="primary" class="site-main">
<h2>Rette</h2>
<div id="holder"></div>
    <template>
      <article>     
          <h3></h3>
      </article>
    </template>

	</main><!-- #main -->
<script>
	const siteUrl = "https://helenaadelaide.dk/kea/09_cms/norrebrounited/medarbejdere/";
	let restauranter =[];
	const restaurantTemp = document.querySelector("#holder");
	const restaurantListe = document.querySelector("#template");
	getJson();
	async function getJson(){
		const response = await fetch(siteUrl);
		restauranter = await response.json();
		console.log (restauranter);
		vis(restauranter);
	}

	function vis(json) {
        const holder = document.querySelector("#holder");
        const skabelon = document.querySelector("template");

        json.forEach((restaurant) => {
          console.log("restaurant",restaurant);
          const klon = skabelon.cloneNode(true).content;
          klon.querySelector("h3").textContent = restaurant.lokation;
          holder.appendChild(klon);
        });
      }
</script>

get_footer();