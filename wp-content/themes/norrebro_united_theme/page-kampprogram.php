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
            <p class="hold"></p>
            <p class="modstander"></p>
            <p class="lokation"></p>
            <p class="tidspunkt"></p>
      </article>
    </template>

	</main><!-- #main -->
<script>
	const siteUrl = "https://helenaadelaide.dk/kea/09_cms/norrebrounited/wp-json/wp/v2/kampe_handbold?per_page=100";
	let kampe_handbold =[];
	const kamp_handboldTemp = document.querySelector("#holder");
	const kamp_handboldListe = document.querySelector("#template");
	getJson();
	async function getJson(){
		const response = await fetch(siteUrl);
		kampe_handbold = await response.json();
		console.log(kampe_handbold);
		vis(kampe_handbold);
	}

	function vis(json) {
        const holder = document.querySelector("#holder");
        const skabelon = document.querySelector("template");

        json.forEach((kamp_handbold) => {
          console.log("kamp_handbold",kamp_handbold);
          const klon = skabelon.cloneNode(true).content;
          klon.querySelector(".lokation").textContent = kamp_handbold.lokation;
          klon.querySelector(".hold").textContent = kamp_handbold.hold;
          klon.querySelector(".modstander").textContent = kamp_handbold.modstander_;
          klon.querySelector(".tidspunkt").textContent = kamp_handbold.tidspunkt_;
          holder.appendChild(klon);
        });
      }
</script>

<?php get_footer(); ?>