<?php /*
  * index Template == default for all (für uns Beitragsseite -> Einstellung lesen)
  * https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
?>
<?php get_header(); // WordPress Funktion zum Einbinden der header.php ?>
	<section class="slider">
		<input type="radio" name="slider" id="slide1" checked>
		<input type="radio" name="slider" id="slide2">
		<input type="radio" name="slider" id="slide3">
		<div class="slides">
		  <div class="slider-image" id="slide1-img"></div>
		  <div class="slider-image" id="slide2-img"></div>
		  <div class="slider-image" id="slide3-img"></div>
		</div>
		<div class="slider-navigation">
		  <label for="slide1"></label>
		  <label for="slide2"></label>
		  <label for="slide3"></label>
		</div>
	  </section>
	
	
	<section id="home">
		<h2>Home</h2>
		<p>Hier können Sie den Inhalt für Ihre Startseite einfügen.</p>
	</section>
	
	<section id="about">
		<h2>Über uns</h2>
		<p>Hier können Sie den Inhalt für die Über uns-Seite einfügen.</p>
	</section>
	
	<section id="services">
		<h2>Unsere Leistungen</h2>
		<p>Hier können Sie den Inhalt für die Unsere Leistungen-Seite einfügen.</p>
	</section>
	
	<section id="portfolio">
		<h2>Portfolio</h2>
		<p>Hier können Sie den Inhalt für die Portfolio-Seite einfügen.</p>
	</section>
	
	<section id="contact">
		<h2>Kontakt</h2>
		<p>Hier können Sie den Inhalt für die Kontakt-Seite einfügen.</p>
	</section>




<?php get_footer(); // WordPress Funktion zum Einbinden der footer.php ?>