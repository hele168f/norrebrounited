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

	<main id="primary" class="site-main-merch">
    
  <h2>PRODUKTER</h2>
  <div id="filtrering"><button data-merch="alle">Alle</button></div>
  <div id="holder"></div>
    <template>
      <article>  
          <img src="" alt="">   
          <h4></h4>
          <p class="produkt_pris"> </p>
      </article>
    </template>

	</main><!-- #main -->
<script>
	const siteUrl = "https://helenaadelaide.dk/kea/09_cms/norrebrounited/wp-json/wp/v2/merch/?per_page=100";
  const catUrl = "https://helenaadelaide.dk/kea/09_cms/norrebrounited/wp-json/wp/v2/categories";
	let merch =[];
  let categories =[];
  let filterMerch ="alle";
	const merchTemp = document.querySelector("#holder");
	const merchListe = document.querySelector("#template");
	getJson();
	async function getJson(){
		const response = await fetch(siteUrl);
    const catdata = await fetch(catUrl);
		merch = await response.json();
    categories = await catdata.json();
		console.log (categories);
		vis(merch);
    opretknapper();

	}
  function opretknapper() {

    categories.forEach(cat =>{
        document.querySelector("#filtrering").innerHTML += `<button class="filter" data-merch="${cat.id}">${cat.name}</button>`
    })

    addEventListenersToButtons();
  }

  function addEventListenersToButtons(){
    document.querySelectorAll("#filtrering button").forEach(elm =>{
      elm.addEventListener("click", filtrering);
    })

  };

  function filtrering(){
    filterMerch = this.dataset.merch;
    console.log(filterMerch);

    vis(merch);
  }


	function vis(json) {
        const holder = document.querySelector("#holder");
        const skabelon = document.querySelector("template");
        holder.innerHTML = "";

        json.forEach((merch) => {
          if ( filterMerch == "alle" || merch.categories.includes(parseInt(filterMerch))){
          console.log("merch",merch);
          const klon = skabelon.cloneNode(true).content;
          klon.querySelector("img").src = merch.billede.guid;
          klon.querySelector("h4").textContent = merch.produktnavn;
          klon.querySelector(".produkt_pris").textContent = merch.pris;
          klon.querySelector("article").addEventListener("click", () => {location.href = merch.link; })
          holder.appendChild(klon);
          }
        });

      }
</script>

<?php get_footer(); ?>