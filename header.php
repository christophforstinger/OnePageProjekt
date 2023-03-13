<?php 
  ?>


<!DOCTYPE html>
<?php 
 ?>
<html lang="de">
<head>
    <?php /* die WordPress Funktion "bloginfo()" gibt nütliche Informationen zur Website zurück. Über den Parameter 'show' können einzelne Werte ausgegeben werden.
        * bloginfo('charset') gibt den Zeichensatz der eingestellten Sprache zurück (ZB: UTF-8 )
        * https://developer.wordpress.org/reference/functions/bloginfo/
        * Hinweis: wird dieses Theme nur für Sprachen in UTF-8 entwickelt, könnte dieser Hardcoded eingefügt werden (also ohne Funktionsaufruf)
        */
    ?>
    <meta charset="<?php bloginfo('charset'); ?>>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>OnePager FooTec </title>
	<link rel="stylesheet" href="style.css">
	
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <?php wp_head();
    ?>
</head>
<?php /* body_class() liefert viele nützliche Klassen-Namen aus WordPress. ZB: logged-in, admin-bar, template, post-id, etc.
     * https://developer.wordpress.org/reference/functions/body_class/
     */ ?>
<body <?php body_class(); ?>>
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