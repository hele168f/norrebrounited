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
    <section id="primary" class="content-area">
	<main id="main-merch" class="site-main-merch">
    
      <article>  
          <img src="" alt="">  
          <p class="produkt_beskrivelse"> </p> 
          <h4></h4>
          <p class="produkt_pris"> </p>
      </article>

	</main><!-- #main -->
<script>
    let produkt =[];

	const siteUrl = "https://helenaadelaide.dk/kea/09_cms/norrebrounited/wp-json/wp/v2/merch/"+<?php echo get_the_ID()?>;
	
	getJson();
	async function getJson(){
		const data = await fetch(siteUrl);
		produkt = await data.json();
		vis(produkt);
	}

	function vis(json) {
        const holder = document.querySelector("#holder");
        const skabelon = document.querySelector("template");

        json.forEach((produkt) => {
          console.log("produkt", produkt);
          const klon = skabelon.cloneNode(true).content;
          klon.querySelector("img").src = merch.billede.guid;
          klon.querySelector(".produkt_beskrivelse").textContent = merch.produktbeskrivelse;
          klon.querySelector(".produkt_pris").textContent = merch.pris;
          
          holder.appendChild(klon);
        });
      }
</script>
    </section>

<?php get_footer(); ?>