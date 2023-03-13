<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>OnePager mit Header, Navmenü und Slider</title>
	<link rel="stylesheet" href="style.css">
	
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
	
</head>
<body>
	<header>
		<h1>Willkommen auf meiner Webseite</h1>
	
	</header>
	
    </div>

	<nav>


		  <ul>
			<li><a href="#home">Home</a></li>
			<li><a href="#about">Über uns</a></li>
			<li><a href="#services">Unsere Leistungen</a></li>
			<li><a href="#portfolio">Portfolio</a></li>
			<li><a href="#contact">Kontakt</a></li>
		</ul>
	</nav>


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


    

    <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h4>Kontaktieren Sie uns</h4>
          <form action="#" method="POST">
            <input type="text" name="name" placeholder="Ihr Name" required>
            <input type="email" name="email" placeholder="Ihre E-Mail-Adresse" required>
            <textarea name="message" placeholder="Ihre Nachricht" required></textarea>
            <button type="submit">Senden</button>
          </form>
        </div>
        <div class="col-md-6">
          <h4>Kontaktinformationen</h4>
          <p><i class="fas fa-map-marker-alt"></i> Musterstraße 1, 1234 Musterstadt</p>
          <p><i class="fas fa-phone"></i> +43 123 456789</p>
          <p><i class="fas fa-envelope"></i> info@footec.at</p>
        </div>
      </div>
    </div>
  </footer>
  <script src="JSscript.js"></script>
</body>
</html>