<?php 
  ?>


<!DOCTYPE html>
<?php 
 ?>
<html lang="de">
<head>
    <?php 

    ?>
    <meta charset="<?php bloginfo('charset'); ?>>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>OnePager FooTec </title>
	<link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
	
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <?php wp_head();
    ?>
</head>
<?php 
 ?>
<body <?php body_class(); ?>>
<body>
	<header>
		<h1>Willkommen auf meiner Webseite</h1>
	
	</header>
	
    </div>

	<a href="#content" class="screen-reader-text"><?php _e('Skip to Content', 'ize'); ?></a>
<nav id="navbar">
    <div class="container">
        <div id="brand">
            <?php 
            if (function_exists('the_custom_logo')) {
                the_custom_logo();
            } ?>
        </div>


      
        <label for="nav-toggle" id="nav-button">
            <span class="nav-button-icon" aria-hidden="true"></span>
            <span class="screen-reader-text"><?php _e('Navigation öffnen/schließen', 'wifi'); ?></span>
        </label>
        <?php 
        wp_nav_menu(array(
            'theme_location' => 'primary', 
            'container' => false,           
            'menu_class' => 'nav-menu',     
            'menu_id' => 'nav-main',        
            'depth' => 2,                   
            'fallback_cb' => false         
        )); ?>
    </div>
</nav>