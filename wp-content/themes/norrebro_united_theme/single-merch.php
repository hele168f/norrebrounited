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
    <template>
      <article>  
          <img src="" alt="">  
          <p class="produkt_beskrivelse"> </p> 
          <h4></h4>
          <p class="produkt_pris"> </p>
      </article>
    </template>

	</main><!-- #main -->
<script>
	const siteUrl = "https://helenaadelaide.dk/kea/09_cms/norrebrounited/wp-json/wp/v2/merch/"+<?php echo get_the_ID()?>;
	let produkt =[];
	const produktTemp = document.querySelector("#holder");
	const produktListe = document.querySelector("#template");
	getJson();
	async function getJson(){
		const response = await fetch(siteUrl);
		produkt = await response.json();
		console.log (produkt);
		vis(produkt);
	}

	function vis(json) {
        const holder = document.querySelector("#holder");
        const skabelon = document.querySelector("template");

        json.forEach((produkt) => {
          console.log("produkt",produkt);
          const klon = skabelon.cloneNode(true).content;
          klon.querySelector("img").src = merch.billede.guid;
          klon.querySelector(".produkt_beskrivelse").textContent = merch.produktbeskrivelse;
          klon.querySelector(".produkt_pris").textContent = merch.pris;
          
          holder.appendChild(klon);
        });
      }
</script>

<?php get_footer(); ?>