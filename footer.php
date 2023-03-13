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
  </footer>
  <a id="back-btn" href="#">  &#128285  </a>
<?php wp_footer(); ?>
</body>

</html>