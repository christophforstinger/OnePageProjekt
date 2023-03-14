<?php /*
 * die footer.php wird auf jeder Seiten eingebunden (über die Funktion "get_footer()" in den einzelnen Templates).
 * Somit hier sollte das Markup, dass auf jeder Seite im Footer angezeigt wird, zu finden sein.
 * Am Ende sollte immer der schließende </body> und </html> Tag stehen - geöffnet werden die Tags in der Datei "header.php"
*/ ?>
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
    
    <nav id="nav-footer" class="column">
        <?php /*
                * Ausgabe des Menüs, dass im WordPress als "Footer Navigation" festgelegt wurde (Design -> Menüs oder Cusotmizer -> Menüs / Position im Theme: Checkbox "Footer Navigation")
                * https://developer.wordpress.org/reference/functions/wp_nav_menu/
                */
        wp_nav_menu(array(
            'theme_location' => 'footer',   // wurde in der functions.php festgelegt "register_nav_menus()"
            'container' => false,      // true würde eine <div> um die <ul> des wp_nav_menu() erzeugen
            'menu_class' => 'nav-menu', // Klassenname der ul: <ul class="nav-menu">
            'depth' => 1,          // Anzahl der Menüebenen die ausgegeben werden
            'fallback_cb' => false       // wenn im WordPress kein Menü als "Footer Navigation" zugewiesen wurde (Checkbox), wird keine Navigation ausgegeben. Default wäre die Ausgebe der WordPress Funktion "wp_page_menu()" (https://developer.wordpress.org/reference/functions/wp_page_menu/)
        )); ?>
    </nav>
  </footer>
  <a id="back-btn" href="#">  &#128285  </a>
<?php wp_footer(); ?>
</body>

</html>