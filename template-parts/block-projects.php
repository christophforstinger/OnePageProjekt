<?php
/*
 * Ausgabe des ACF-Block
 * https://www.advancedcustomfields.com/resources/blocks/#3-render-the-block
 * */

/* Erstellen des ID-Attributs, falls ein "HTML-Anker" in den erweiterten Block-Einstellungen im Editor eingegeben wurden
 * „$block['anchor']“ liefert die ID (HTML-Anker) aus dem Editor
 *
 * https://developer.wordpress.org/reference/functions/esc_attr/
 */
$anchor = '';
if (!empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

/* Erstellen des Klassen-Attributs
 * „$block['className']“ liefert die "zusätzlichen CSS Klassen" aus den erweiterten Block-Einstellungen im Editor
 *
 * die Funktion wp_is_mobile() prüft ob der Browser auf einem mobilen Endgerät läuft (wird benötigt, um die Projekt-Titel auf mobilen Endgeräten ohne hover einzublenden)
 * https://developer.wordpress.org/reference/functions/wp_is_mobile/
 */
$class_name = 'projects';
if (wp_is_mobile()) {
    $class_name .= ' is-mobile';
}
if (!empty($block['className'])) {
    $class_name .= ' ' . esc_attr($block['className']);
}

/*
 * ACF Gruppe-Feld in Variable speichern – Rückgabewert ist ein Array
 * https://www.advancedcustomfields.com/resources/group/
 */
$settings = get_field('project_settings');

/*
 * WordPress Standard Schleife mit geänderten/angepassten Abfrage-Parametern
 * https://developer.wordpress.org/reference/classes/wp_query/
 */

// Argumente
$args = [
    'post_type' => 'project',       // register_post_type in functions.php
    'ignore_sticky_posts' => true,  // Beitrag "oben halten" wird ignoriert
    'order' => $settings['order'],  // Reihenfolge über ACF Button-Group
    'posts_per_page' => $settings['number']   // Beiträge (Projekte) auf dieser Seite/Carousel über ACF Nummer-Bereich
];

// Query
$project_query = new WP_Query($args);


if ($project_query->have_posts()) : ?>
    <section <?php echo $anchor; ?>class="<?php echo $class_name; ?>" aria-label="Project Carousel">
        <?php /*
         * Ausgabe ACF Text-Field – keine Bedingung, da Pflichtfeld
         * https://www.advancedcustomfields.com/resources/the_field/
         */ ?>
        <h2 class="is-style-headline"><?php _e('Projects', 'wifi') ?></h2>
        <div class="splide">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php
                    /*
                    * Ausgabe des ACF Repeater-Field Array mit foreach-Schleife
                    * https://www.advancedcustomfields.com/resources/repeater/#foreach-loop
                    *
                    * Innerhalb der Schleife sind keine Bedingungen notwendig, da alle ACF Felder als Pflichtfelder angelegt wurden
                    */
                    while ($project_query->have_posts()) : $project_query->the_post(); ?>
                        <li class="splide__slide">
                            <figure class="project">
                                <?php /*
                            * the_permalink() gibt die URL zum Beitrag (Detailseite) aus
                            * https://developer.wordpress.org/reference/functions/the_permalink/
                            */ ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php /*
                            * Bild von ACF Feld ausgeben – Einstellung für Rückgabewert beim ACF Feld = ID (das bedeutet wir bekommen die Bild-ID als Rückgabewert)
                            * https://www.advancedcustomfields.com/resources/get_field/
                            * https://www.advancedcustomfields.com/resources/image/
                            *
                            * Bedingung: falls kein Bild eingefügt wurde, wird ein Default-Image aus dem /assets/images geladen (Achtung, dass Platzhalterbild sollte gleich groß sein wie die "Attachment-Image-Size - project")
                            */
                                  
                                    $project_image = get_field('project_image', get_the_ID() );
                                    if ($project_image) {
                                        /*
                                         * wp_get_attachment_image() gibt ein Responsive-Image zurück (komplettes HTML-Element)
                                         * Parameter1 ist die Bild-ID (aus dem ACF-Feld), Parameter2 ist die Bildgröße (default sind WP-Sizes "thumbnail, medium, medium_large, large, full" – "project" haben wir in der functions.php erstellt)
                                         * https://developer.wordpress.org/reference/functions/wp_get_attachment_image/
                                         */
                                        echo wp_get_attachment_image($project_image, 'project');
                                    } else {
                                        /*
                                         * get_template_directory_uri() gibt den absoluten Pfad zum Theme-Verzeichnis zurück
                                         * https://developer.wordpress.org/reference/functions/get_template_directory_uri/
                                         */
                                        echo '<img src="' . get_template_directory_uri() . '/assets/images/placeholder.jpg" alt="Placeholder">';
                                    } ?>
                                </a>
                                <figcaption class="project-caption">
                                    <?php
                                    /*  Mit the_title() wird der Beitrags-Titel ausgegeben
                                      * https://developer.wordpress.org/reference/functions/the_title/
                                      *
                                      * sprintf — gibt einen formatierten String zurück
                                      * https://www.php.net/manual/en/function.sprintf.php
                                      *
                                      * esc_url prüft URLs und bereinigt diese (z.B.: Codieren von Leerzeichen)
                                      * https://developer.wordpress.org/reference/functions/esc_url/
                                      *
                                      * the_permalink() gibt die URL zum Beitrag (Detailseite) aus
                                      * https://developer.wordpress.org/reference/functions/the_permalink/
                                      */
                                    the_title(sprintf('<h3 class="project-title"><a href="%s">', esc_url(get_permalink())), '</a></h3>'); ?>
                                </figcaption>
                            </figure>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
        <?php
        /*
         * Splide CSS & JS wurden in der functions.php bereits registriert und werden jetzt in <head> bzw. vor dem </body> eingebunden [ wp_head() , wp_footer() ]
         * der "Handle" aus der functions.php muss verwendet werden
         * https://developer.wordpress.org/reference/functions/wp_enqueue_script/
         * https://developer.wordpress.org/reference/functions/wp_enqueue_style/
         *
         * durch wp_add_inline_script() kann ein <script> Tag mit data (JS Code) zu einem Handle angefügt werden.
         * https://developer.wordpress.org/reference/functions/wp_add_inline_script/
         */
        wp_enqueue_style('splide-css');
        wp_enqueue_script('splide-js');
        wp_add_inline_script("splide-js", "document.addEventListener( 'DOMContentLoaded', function() {
                let splide = new Splide( '.projects .splide', {
                    perPage: 1,
                    pagination: false,
                    mediaQuery: 'min',
                    breakpoints: {
                        768: {
                            perPage: 2,
                            gap: 15
                        },
                        1200: {
                            perPage: 3,
                            gap: 30
                        }
                    }
                } );
                splide.mount();
            } );");
        ?>
        <?php /*
        * Bedingung: falls ein Link ausgewählt wurde, sollte der Button zur Projektseite angezeigt werden
        */
        if (!empty($settings['link'])): ?>
            <div class="actions">
                <a href="<?php echo $settings['link']; ?>" class="btn"><?php _e('All Projects', 'wifi') ?></a>
            </div>
        <?php endif; ?>
    </section>
<?php
/* Bedingung: falls ACF Repeater-Feld leer ist, sollte der Hinweis "Block bearbeiten" im Backend (Editor) angezeigt werden, sonst ist der Block nur in der "Listenansicht" (Editor) sichtbar/editierbar
 * Die Funktion "is_admin()" prüft ob der Code im Admin-Panel (wp-admin) ausgeführt wird
 * https://developer.wordpress.org/reference/functions/is_admin/
 *
 * Nützliche conditional Tags:  https://developer.wordpress.org/themes/basics/conditional-tags/
 */
elseif (is_admin()) : ?>
    <h2 class="empty-block"><?php _e('Block bearbeiten &raquo;', 'wifi') ?></h2>
<?php endif;
/*
 * Restore original Post Data
 * Notwendig wenn die Abfrage-Parameter "new WP_Query()" geändert wurden
 */
wp_reset_postdata();
