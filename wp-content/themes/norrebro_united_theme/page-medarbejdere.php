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

	<main id="primary" class="site-main-medarbejder">
<h2>Medarbejdere</h2>
<div id="holder"></div>
    <template>
      <article>     
          <h4></h4>
          <img src="" alt="">
          <p class="navn"> </p>
          <p class="telefon"></p>
				  <p class="email"></p>
      </article>
    </template>

	</main><!-- #main -->
<script>
	const siteUrl = "https://helenaadelaide.dk/kea/09_cms/norrebrounited/wp-json/wp/v2/medarbejdere?per_page=100";
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
          klon.querySelector("h4").textContent = medarbejder.arbejdsposition;
          klon.querySelector("img").src = medarbejder.profil_billede.guid;
          klon.querySelector(".navn").textContent = medarbejder.navn;
          klon.querySelector(".telefon").textContent = medarbejder.telefon;
          klon.querySelector(".email").textContent = medarbejder.email;
          
          holder.appendChild(klon);
        });
      }
</script>

get_footer();