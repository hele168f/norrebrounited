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

	<main id="primary" class="site-main-merch">
<h2>PRODUKTER</h2>
<div id="holder"></div>
    <template>
      <article>  
          <img src="" alt="">   
          <h4></h4>
          <p class="produkt_pris"> </p>
      </article>
    </template>

	</main><!-- #main -->
<script>
	const siteUrl = "https://helenaadelaide.dk/kea/09_cms/norrebrounited/wp-json/wp/v2/merch/?per_page=100";
	let merch =[];
	const merchTemp = document.querySelector("#holder");
	const merchListe = document.querySelector("#template");
	getJson();
	async function getJson(){
		const response = await fetch(siteUrl);
		merch = await response.json();
		console.log (merch);
		vis(merch);
	}

	function vis(json) {
        const holder = document.querySelector("#holder");
        const skabelon = document.querySelector("template");

        json.forEach((merch) => {
          console.log("merch",merch);
          const klon = skabelon.cloneNode(true).content;
          klon.querySelector("img").src = merch.billede.guid;
          klon.querySelector("h4").textContent = merch.produkt-navn;
          klon.querySelector(".produkt_pris").textContent = merch.pris;
          holder.appendChild(klon);
        });
      }
</script>

<?php get_footer(); ?>