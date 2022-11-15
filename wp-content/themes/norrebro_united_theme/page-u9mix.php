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
<h2>KAMPPROGRAM</h2>
<div id="holder"></div>
    <template>
      <article>     
          <p class="lokation"></p>
      </article>
    </template>

	</main><!-- #main -->
<script>
	const siteUrl = "https://helenaadelaide.dk/kea/09_cms/norrebrounited/wp-json/wp/v2/u9mix?per_page=100/";
	let kamp =[];
	const kamp_handboldTemp = document.querySelector("#holder");
	const kamp_handboldListe = document.querySelector("#template");
	getJson();
	async function getJson(){
		const response = await fetch(siteUrl);
		u9mix = await response.json();
		console.log(u9mix);
		vis(u9mix);
	}

	function vis(json) {
        const holder = document.querySelector("#holder");
        const skabelon = document.querySelector("template");

        json.forEach((kamp_handbold) => {
          console.log("kamp_handbold",kamp_handbold);
          const klon = skabelon.cloneNode(true).content;
          klon.querySelector(".lokation").textContent = kamp_handbold.lokation;
          holder.appendChild(klon);
        });
      }
</script>

get_footer();