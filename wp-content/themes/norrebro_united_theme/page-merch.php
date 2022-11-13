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
	const siteUrl = "https://helenaadelaide.dk/kea/09_cms/norrebrounited/wp-json/wp/v2/merch";
	let merch_produkter =[];
	const produktTemp = document.querySelector("#holder");
	const produktListe = document.querySelector("#template");
	getJson();
	async function getJson(){
		const response = await fetch(siteUrl);
		merch_produkter = await response.json();
		console.log (merch_produkter);
		vis(merch_produkter);
	}

	function vis(json) {
        const holder = document.querySelector("#holder");
        const skabelon = document.querySelector("template");

        json.forEach((produkt) => {
          console.log("produkt",produkt);
          const klon = skabelon.cloneNode(true).content;
          klon.querySelector("h3").textContent = produkt.produkt-navn;
          holder.appendChild(klon);
        });
      }
</script>

get_footer();