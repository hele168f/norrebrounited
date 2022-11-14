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
	let kampe_håndbold =[];
	const kamp_håndboldTemp = document.querySelector("#holder");
	const kamp_håndboldListe = document.querySelector("#template");
	getJson();
	async function getJson(){
		const response = await fetch(siteUrl);
		kampe_håndbold = await response.json();
		console.log(kampe_håndbold);
		vis(kampe_håndbold);
	}

	function vis(json) {
        const holder = document.querySelector("#holder");
        const skabelon = document.querySelector("template");

        json.forEach((kamp_håndbold) => {
          console.log("kamp_håndbold",kamp_håndbold);
          const klon = skabelon.cloneNode(true).content;
          klon.querySelector("h3").textContent = kamp_håndbold.lokation;
          holder.appendChild(klon);
        });
      }
</script>

get_footer();