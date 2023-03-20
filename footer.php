<?php
?>
   <footer>
   <div class="container">
      <div class="row">
        <div class="col-md-6">
        
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
        <?php 
        wp_nav_menu(array(
            'theme_location' => 'footer',  
            'container' => false,      
            'menu_class' => 'nav-menu', 
            'depth' => 1,          
            'fallback_cb' => false      
        )); ?>
    </nav>
  </footer>
  <a id="back-btn" href="#">  &#128285  </a>
<?php wp_footer(); ?>
</body>

</html>