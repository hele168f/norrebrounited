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

	<main id="primary" class="site-main-bestyrelsen">
<h2>Bestyrelsen</h2>
<p> Nørrebro United  ledes af en bestyrelse der vælges for en et årig periode på klubbens generalforsamling</p>
          <p>Bestyrelsen er på 9 personer, og konstituerer sig efter valg på generalforsamling med:</p>
          <p>Formand.Næstformand. Kasserer. En repræsentant for ungdomsafdelingen. Menige bestyrelsesmedlemmer.</p>
          <p>Bestyrelsen fastsætter selv sin forretningsorden, uddeleger ansvar og nedsætte udvalg efter behov</p>
          <p>Alle kan sende henstillinger eller spørgsmål til behandling i bestyrelsen senest 1 uge inden næste møde på bestyrelsen@nbunited.dk</p>
<h2>Bestyrelsesmedlemmer</h2>
<div id="holder"></div>
    <template>
      <article>     
          <h4 class="title"> </h4>
          <img src="" alt="">
          <p class="navn"> </p>
		    <p class="email"></p>
      </article>
    </template>

	</main><!-- #main -->
<script>
	const siteUrl = "https://helenaadelaide.dk/kea/09_cms/norrebrounited/wp-json/wp/v2/bestyrelse?per_page=100";
	let bestyrelse =[];
	const bestyrelseTemp = document.querySelector("#holder");
	const bestyrelseListe = document.querySelector("#template");
	getJson();
	async function getJson(){
		const response = await fetch(siteUrl);
		bestyrelse = await response.json();
		console.log (bestyrelse);
		vis(bestyrelse);
	}

	function vis(json) {
        const holder = document.querySelector("#holder");
        const skabelon = document.querySelector("template");

        json.forEach((bestyrelse) => {
          console.log("bestyrelse", bestyrelse);
          const klon = skabelon.cloneNode(true).content;
          klon.querySelector("h4").textContent = bestyrelse.arbejdstitel;
          klon.querySelector("img").src = bestyrelse.foto.guid;
          klon.querySelector(".navn").textContent = bestyrelse.navn;
          klon.querySelector(".email").textContent = bestyrelse.email;
          
          holder.appendChild(klon);
        });
      }
</script>

<?php get_footer(); ?>