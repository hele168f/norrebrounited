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
<h2>NYHEDER</h2>
<div id="holder"></div>
    <template>
      <article>  
            <h4></h4>
          <p class="tidspunkt"> </p>
          <img src="" alt=""> 
      </article>
    </template>

	</main><!-- #main -->
<script>
	const siteUrl = "https://helenaadelaide.dk/kea/09_cms/norrebrounited/wp-json/wp/v2/nyhed/?per_page=100";
	let nyhed =[];
	const nyhederTemp = document.querySelector("#hold");
	const nyhederListe = document.querySelector("#template");
	getJson();
	async function getJson(){
		const response = await fetch(siteUrl);
		nyheder = await response.json();
		console.log (nyheder);
		vis(nyheder);
	}

	function vis(json) {
        const holder = document.querySelector("#hold");
        const skabelon = document.querySelector("template");

        json.forEach((nyheder) => {
          console.log("nyheder",nyheder);
          const klon = skabelon.cloneNode(true).content;
          klon.querySelector("img").src = nyheder.billede.guid;
          klon.querySelector("h4").textContent = nyheder.navn;
          klon.querySelector(".tidspunkt").textContent = nyheder.tidspunkt;
          holder.appendChild(klon);
        });
      }
</script>

<?php get_footer(); ?>