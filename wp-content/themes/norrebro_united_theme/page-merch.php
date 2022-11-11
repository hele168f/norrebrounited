<?php
/**
 * Theme Page Section for our theme.
 *
 * @package ThemeGrill
 * @subpackage Spacious
 * @since Spacious 1.0
 */
get_header();
?>

	<main id="primary" class="site-main">
<h2>PRODUKTER</h2>
<div id="holder"></div>
    <template>
      <article>     
          <h3></h3>
      </article>
    </template>

	</main><!-- #main -->
<script>
	const siteUrl = "https://helenaadelaide.dk/kea/09_cms/norrebrounited/wp-json/wp/v2/medarbejdere";
	let medarbejdere =[];
	const medarbejderTemp = document.querySelector("#holder");
	const medarbejderListe = document.querySelector("#template");
	getJson();
	async function getJson(){
		const response = await fetch(siteUrl);
		medarbejdere = await response.json();
		console.log (medarbejdere);
		vis(medarbejdere);
	}

	function vis(json) {
        const holder = document.querySelector("#holder");
        const skabelon = document.querySelector("template");

        json.forEach((medarbejder) => {
          console.log("medarbejder",medarbejder);
          const klon = skabelon.cloneNode(true).content;
          klon.querySelector("h3").textContent = medarbejder.navn;
          holder.appendChild(klon);
        });
      }
</script>

get_footer();