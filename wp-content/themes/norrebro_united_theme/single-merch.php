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

	<main id="primary" class="site-main-produkt">
    <h2>PRODUKTER</h2>
    <div id="holder"></div>
      <article>  
          <img src="" alt="">  
          <p class="produkt_beskrivelse"> </p> 
          <h4></h4>
          <p class="produkt_pris"> </p>
      </article>

	</main><!-- #main -->
<script>
	const siteUrl = "https://helenaadelaide.dk/kea/09_cms/norrebrounited/wp-json/wp/v2/merch/"+<?php echo get_the_ID()?>;
	let produkt;
	const produktTemp = document.querySelector("#holder");
	const produktListe = document.querySelector("#template");
	getJson();
	async function getJson(){
		const response = await fetch(siteUrl);
		produkt = await response.json();
		console.log (produkt);
		vis();
	}

	function vis() {

          console.log("produkt",produkt);
          document.querySelector("img").src = produkt.billede.guid;
          document.querySelector(".produkt_beskrivelse").textContent = produkt.produktbeskrivelse;
          document.querySelector(".produkt_pris").textContent = produkt.pris;
      }
</script>

<?php get_footer(); ?>