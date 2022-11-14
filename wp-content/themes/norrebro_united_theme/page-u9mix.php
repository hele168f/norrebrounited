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
	const siteUrl = "https://helenaadelaide.dk/kea/09_cms/norrebrounited/wp-json/wp/v2/u9mix/";
	let kampe =[];
	const kampTemp = document.querySelector("#holder");
	const kampListe = document.querySelector("#template");
	getJson();
	async function getJson(){
		const response = await fetch(siteUrl);
		kampe = await response.json();
		console.log(kampe);
		vis(kampe);
	}

	function vis(json) {
        const holder = document.querySelector("#holder");
        const skabelon = document.querySelector("template");

        json.forEach((kamp) => {
          console.log("kamp",kamp);
          const klon = skabelon.cloneNode(true).content;
          klon.querySelector("h3").textContent = kamp.lokation;
          holder.appendChild(klon);
        });
      }
</script>

get_footer();