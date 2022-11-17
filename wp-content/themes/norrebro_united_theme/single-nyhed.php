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

	<main id="primary" class="site-main-nyheder">

    <div id="singe-view-produkt"></div>
      <article>  
                <div class="nyheder-single-billede"> 
                    <img class="pic" src="" alt="">
                </div>
				<div class="nyheder-single-tekst">
				<h3 class="nyheder_navn"> </h3> 
				<p class="nyheder-tidspunkt"> </p>
				<p class="nyheder-single-brødtekst"> </p>
				</div>

        </article>

	</main><!-- #main -->
<script>
	const siteUrl = "https://helenaadelaide.dk/kea/09_cms/norrebrounited/wp-json/wp/v2/nyhed/"+<?php echo get_the_ID()?>;
	let nyheder;
	const nyhederTemp = document.querySelector("#holder");
	const nyhederListe = document.querySelector("#template");
	getJson();
	async function getJson(){
		const response = await fetch(siteUrl);
		nyheder = await response.json();
		console.log (nyheder);
		vis();
	}

	function vis() {

          console.log("nyheder",nyheder);
          document.querySelector(".pic").src = nyheder.billede.guid;
		  document.querySelector(".nyheder_navn").textContent = nyheder.navn;
		  document.querySelector(".nyheder-single-brødtekst").textContent = nyheder.tekst;
		  document.querySelector(".nyheder-tidspunkt").textContent = nyheder.tidspunkt;
      }
</script>

<?php get_footer(); ?>