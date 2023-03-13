<?php
/*
 * In der functions.php werden über Actions, Filter & Hooks sämtliche WordPress Funktionen de-/aktiviert bzw. angepasst
 * https://developer.wordpress.org/themes/basics/theme-functions/
 * https://kinsta.com/de/blog/wordpress-hooks/
 *
 * Offizielle Doku zu WordPress Themes: https://developer.wordpress.org/themes/
 * Offizielle Doku zum Gutenberg Editor: https://developer.wordpress.org/block-editor/
 *
 * Auch eigene PHP-Funktionen, die man in den Teplates verwenden möchte, können in die functions.php geschrieben werden
 */

/* ---- Theme Setups ----
* Dieser Hook wird bei jedem Laden der Seite aufgerufen, nachdem das Theme initialisiert wurde. Es wird im Allgemeinen verwendet, um grundlegende Setup-, Registrierungs- und Initiierungsaktionen für ein Theme auszuführen.
* https://developer.wordpress.org/reference/hooks/after_setup_theme/
*/
add_action('after_setup_theme', function () {

    // Title Tag in <head> : <title>...</title>
    add_theme_support('title-tag');

    /* Pfad zur Sprachdatei
    * load_textdomain() gibt den Namen der Übersetzungsdatei (beliebiger Name) und den Pfad an, wo diese zu finden ist.
    * https://developer.wordpress.org/reference/functions/load_textdomain/
    * get_template_directory() liefert den absoluten Server-Pfad zum Theme-Verzeichnis (ZB: "/var/www/html/wp-content/themes/webdev-theme") https://developer.wordpress.org/reference/functions/get_template_directory/
    *
    * Sämtliche Texte die wir in unserer functions.php oder in Templates schreiben und im Frontend oder Backend angezeigt werden, sollten über die Textdomain übersetzbar sein!
    * die Ausgabe im PHP wird in der Funktion als echo "_e('Zu übersetzender Text','TEXTDOMAIN')" oder return "__('Zu übersetzender Text','TEXTDOMAIN')" eingebunden
    * https://developer.wordpress.org/reference/functions/_e/
    */
    load_textdomain('wifi', get_template_directory() . '/assets/languages');

        // Aktivierung von Beitragsbildern
    //add_theme_support('post-thumbnails');

   // Eigene Bildgrößen im Theme definieren bzw. registrieren (https://developer.wordpress.org/reference/functions/add_image_size/)
    add_image_size('project', 730, 487, array('center', 'center'));  // 730x487 = 3:2


    // WordPress HTML5-Markup
    add_theme_support('html5', array(
        'search-form',
        'gallery',
        'caption',
        'style',
        'script',
        'comment-list',
        'comment-form'
    ));






    /*
    * register_nav_menus() registriert Navigations Menüs (ohne diese Funktion gibt es im Admin-Menü: "Design > Menüs" nicht zur Aswahl
    * im array werden die "Positionen im Theme" definiert
    * https://developer.wordpress.org/reference/functions/register_nav_menus/
    */
    register_nav_menus(array(
        'primary' => __('Haupt Navigation', 'wifi'),
        'footer' => __('Footer Navigation', 'wifi'),
    ));


    /* -- Customizer --
     * Custom Logo über Customizer zu ändern
     * https://developer.wordpress.org/themes/functionality/custom-logo/
     */
    add_theme_support('custom-logo', array(
        'height' => 60,
        'width' => 100,

        /* Bei SVG (können nicht beschnitten werden) MUSS beides true sein */
        'flex-height' => true,
        'flex-width' => true
    ));


    /* -- Gutenberg Editor --
    * https://developer.wordpress.org/block-editor/developers/themes/theme-support/
    * Offizielle Doku zum Gutenberg Editor: https://developer.wordpress.org/block-editor/
    */

    // Theme für Gutenberg optimiert - Lade default Block styles
    add_theme_support('wp-block-styles');

    // aktiviere wide & fullwidth Layouts
    add_theme_support('align-wide');

    // Custom CSS für Gutenberg (Backend)
    add_theme_support('editor-styles');
    add_editor_style('assets/style-editor.css');
    add_editor_style('assets/icons/style.min.css');

    // Responsive Embeds (ZB. YouTube Videos, Iframes) erlauben
    add_theme_support('responsive-embeds');

    //eigene Schriftgröße im Editor deaktivieren
    //add_theme_support('disable-custom-font-sizes');

    // eigene Farbauswahl-Palette deaktivieren
    //add_theme_support('disable-custom-colors');

    // eignen Farbverlauf im Editor deaktivieren
    //add_theme_support('disable-custom-gradients');

    //Farbpalette im Editor hinzufügen
    /*
    add_theme_support('editor-color-palette', array(
        array(
            'name' => __('Font-Color', 'wifi'),
            'slug' => 'color-1',
            'color' => '#383838'
        ),
        array(
            'name' => __('Background Color', 'wifi'),
            'slug' => 'color-2',
            'color' => '#fff'
        )
    ));
    */

    // Adminbar im Frontend deaktivieren (wenn aktiviert, sollten die Syles für Navigation angepasst werden)
    add_filter('show_admin_bar', '__return_false');

});


/*
 * Zusätzlichen Mimes (Dokumenttypen) für den Upload erlauben
 * https://developer.wordpress.org/reference/hooks/upload_mimes/
 */
add_filter('upload_mimes', function ($mimes = array()) {
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
});


/* ---- CSS & JS in <head> bzw. vor dem </body> einfügen [ wp_head() , wp_footer() ] ----
* https://developer.wordpress.org/reference/functions/wp_enqueue_script/
* der "Handle" muss eindeutig sein
* Liste aller Scripten, die WordPress bereits inkludiert hat: https://developer.wordpress.org/reference/functions/wp_enqueue_script/#default-scripts-and-js-libraries-included-and-registered-by-wordpress
*/
$theme_version = wp_get_theme()->get( 'Version' );
$version = is_string( $theme_version ) ? $theme_version : false;

add_action('wp_enqueue_scripts', function () use ($version) {
    
    // CSS (style.css) im Head einfügen
    wp_enqueue_style('icons-css', get_template_directory_uri() . '/assets/icons/style.min.css');
    wp_enqueue_style('webdev-css', get_template_directory_uri() . '/style.css');

    // Splidejs styles nur registrieren nicht ausgeben
    wp_register_style('splide-css', get_template_directory_uri() . '/assets/css/splide.min.css');

    // JS im Footer einfügen
    wp_enqueue_script('webdev-js', get_template_directory_uri() . '/assets/js/scripts.js', [], $version, true);

    // Splidejs js nur registrieren nicht ausgeben
    wp_register_script('splide-js', get_template_directory_uri() . '/assets/js/splide.min.js',[], $version, true);

});



add_filter('show_admin_bar', '__return_false');



/* --- Custom Post Types ---
* Mit Custom Post Types können eigenen Beitrags- und/oder Seitentypen angelegt werden - eigener Menüpunkt im Admin-Menü
* Der Funktionsaufruf register_post_type() wird in einem "init" Hook ( "add_action('init', 'FUNKTIONSNAME',0)" ) in WordPress eingebunden.
* https://developer.wordpress.org/reference/hooks/init/
*/

/* Register Custom Post Type für Projekte
* Hilfreiches Tool zur generierung des Code: https://generatewp.com/post-type/
* WordPress Doku: https://developer.wordpress.org/reference/functions/register_post_type/
*/
function post_type_project()
{

    $labels = array(
        'name' => _x('Projekte', 'Post Type General Name', 'wifi'),
        'singular_name' => _x('Projekt', 'Post Type Singular Name', 'wifi'),
        'menu_name' => __('Projekte', 'wifi'),
        'name_admin_bar' => __('Projekte', 'wifi'),
        'archives' => __('Projekte Archiv', 'wifi'),
        'attributes' => __('Projekt Attribute', 'wifi'),
        'parent_item_colon' => __('Parent-Projekt:', 'wifi'),
        'all_items' => __('Alle Projekte', 'wifi'),
        'add_new_item' => __('neues Projekt hinzufügen', 'wifi'),
        'add_new' => __('Neues hinzufügen', 'wifi'),
        'new_item' => __('Neues Projekt', 'wifi'),
        'edit_item' => __('Projekt bearbeiten', 'wifi'),
        'update_item' => __('Aktualisiere Projekt', 'wifi'),
        'view_item' => __('zeige Projekt', 'wifi'),
        'view_items' => __('Zeige Projekte', 'wifi'),
        'search_items' => __('Suche Projekt', 'wifi'),
        'not_found' => __('Nichts gefunden', 'wifi'),
        'not_found_in_trash' => __('Not found in Trash', 'wifi'),
        'featured_image' => __('Projektbild', 'wifi'),
        'set_featured_image' => __('Als Projektbild festlegen', 'wifi'),
        'remove_featured_image' => __('Remove featured image', 'wifi'),
        'use_featured_image' => __('Als Projektbild verwenden', 'wifi'),
        'insert_into_item' => __('In Projekt einfügen', 'wifi'),
        'uploaded_to_this_item' => __('Zu Projekt hochladen', 'wifi'),
        'items_list' => __('Projekt Liste', 'wifi'),
        'items_list_navigation' => __('Projekte', 'wifi'),
        'filter_items_list' => __('Filter Projekt Liste', 'wifi'),
    );
    $args = array(
        'label' => __('Projekt', 'wifi'),
        'labels' => $labels,
        'supports' => array('title','editor'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 10,
        'menu_icon' => 'dashicons-format-gallery',  // https://developer.wordpress.org/resource/dashicons/
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => false,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
        'show_in_rest' => true, // true => zugleich Gutenberg Editor (würde das Portfolio rein mit ACF-Feldern aufgebaut werden, dann false)
    );

    register_post_type('project', $args);

}

add_action('init', 'post_type_project', 0);




/* --- Pagination für Custom-Query --- */

/*
 * https://developer.wordpress.org/reference/classes/wp_query/
 * https://developer.wordpress.org/reference/functions/paginate_links/
 * str_replace() = https://www.php.net/manual/de/function.str-replace.php
 */
function pagination( $paged = '', $max_page = '' ) {
    $big = 999999999; // need an unlikely integer
    if( ! $paged ) {
        $paged = get_query_var('paged');
    }

    if( ! $max_page ) {
        global $wp_query;
        $max_page = isset( $wp_query->max_num_pages ) ? $wp_query->max_num_pages : 1;
    }

    $html = '<nav class="pagination">';
    $html.= paginate_links( array(
        'base'       => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format'     => '?paged=%#%',
        'current'    => max( 1, $paged ),
        'total'      => $max_page,
        'mid_size'   => 1,
        'prev_text'  => '<span class="icon-arrow-left" aria-label="' . __('Vorherige Seite', 'wifi') . '"></span>',
        'next_text'  => '<span class="icon-arrow-right" aria-label="' . __('Nächste Seite', 'wifi') . '"></span>'
    ) );
    $html .= '</nav>';
    echo $html;
}




/* --- Funktonen für das Plugin ACF-Pro --- */

/* Bedingung: Prüfe ob ACF Pro installiert und aktiviert ist
* die PHP Funktion "function_exists()" prüft ob es diese Funktion mit dem Funktionsnamen gibt - "acf_add_options_page()" wird über das Plugin ACF-Pro deklariert
* wenn (if) das Plugin ACF-Pro installiert ist, existiert diese Funktion und wir können ACF-Option-Pages und/oder ACF-Gutenberg-Blöcke erstellen
* sonst (else) geben wir im WordPress Adminbereich eine Fehlermeldung aus, dass diese Plugin benötigt wird
* https://www.php.net/manual/de/function.function-exists.php
*/

if (function_exists('acf_add_options_page')) {

   /* ACF Feldgruppen und Feldeinstellungen als .json-Dateien im Theme speichern (Verzeichnis "acf-fields") und von dort laden
    * ACHTUNG: das Verzeichnis "acf-fields" muss existieren, damit die Dateien dort gespeichert werden können!
    * https://www.advancedcustomfields.com/resources/local-json/
    */
    add_filter('acf/settings/save_json', function ( $path ) {
        $path = get_template_directory() . '/acf-fields';
        return $path;
    });
    add_filter('acf/settings/load_json', function ( $paths ) {
        unset($paths[0]);
        $paths[] = get_stylesheet_directory() . '/acf-fields';
        return $paths;
    });


    /* Deaktivieren des ACF-Admin-Menü */
    //add_filter( 'acf/settings/show_admin', '__return_false' );


    /* ACF Option Page erstellen
    * https://www.advancedcustomfields.com/resources/acf_add_options_page/
    */
    acf_add_options_page(array(
        'page_title' => 'Social Links',
        'menu_title' => 'Social Links',
        'menu_slug' => 'webdev-social-links',
        'capability' => 'edit_posts',
        'position' => 50,
        'icon_url' => 'dashicons-admin-links', // https://developer.wordpress.org/resource/dashicons/
        'update_button' => __( 'Änderungen speichern', 'wifi' ),
        'updated_message' => __( 'Änderungen wurden gespeichert', 'wifi' )
    ));


    /* Hinzufügen von Gutenberg-Block-Kategorie */ 
add_filter( 'block_categories_all', function($categories){

    return array_merge(
            array(
                array(
                    'slug' => 'wifi',
                    'title' => 'wifi'
                )
                ),
                $categories
            );

}, 10, 2 );


/* ACF-Gutenberg-Blöcke erstellen : */ 

add_action ( 'acf/init', function (){


    if ( function_exists('acf_register_block_type')  ) {
        
        /* register block "Header" */ 
        acf_register_block_type(array(
                'name' => 'webdev_header',
                'title' =>  __('Header', 'wifi'),
                'description' => __('Folio Header', 'wifi'),
                'supports' => array('anchor' => false),
                'category' => 'wifi',
                'keywords' => array('header', 'folio'),
                'post_types' => array('page'),
                'align' => false,
                'mode' => false,
                'icon' => 'welcome-widget-menus',
                'render_template' => 'template-parts/block-header.php'
        ) );

                /* register block "Services" */ 
        acf_register_block_type(array(
                'name' => 'webdev_services',
                'title' =>  __('Services', 'wifi'),
                'description' => __('Services 2-3 Spalten', 'wifi'),
                'supports' => array('anchor' => true),
                'category' => 'wifi',
                'keywords' => array('services', 'spalten', 'columns', 'teaser', 'Leistungen'),
                'post_types' => array('page'),
                'align' => false,
                'mode' => false,
                'icon' => 'yes',
                'render_template' => 'template-parts/block-services.php'
        ) );

                    // Register Block "Project-Carousel"
            acf_register_block_type(array(
                'name' => 'webdev_project', // Interner Name
                'title' => __( 'Project Carousel', 'wifi' ), // Titel (Anzeigename)
                'description' => __( 'Project Carousel 1–3 Spalten', 'wifi' ), // Beschreibung (wird im Editor bei der Blockauswahl angezeigt)
                'supports' => array('anchor' => true), // Ermöglicht bei den Block-Einstellungen eine ID (Anchor) einzufügen
                'category' => 'wifi',// in welcher Kategorie der Block erscheint - in diesem Fall in unserer eigenen Kategorie, die mit "add_action('block_categories_all'..)" angelegt wurde
                'keywords' => array('projects', 'carousel', 'slider', 'spalten', 'columns'), // optional für die Block-Suche im Editor
                'post_types' => array('page','post','project'), // bei welchen Post-Types der Block angezeigt wird bzw. verwendet werden kann. In diesem Fall bei Seiten (page), Beiträgen (post) und Projekten (CPT project)
                'align' => false, // optional ( left, center, right, wide u. full)
                'mode' => false, // verhindert das Links im Editor nicht weiterleiten, sondern die Bearbeitung des ACF-Blocks erzwungen wird
                'icon' => 'slides', // https://developer.wordpress.org/resource/dashicons/#smiley
                'render_template' => 'template-parts/block-projects.php' // Pfad zum Template (HTML & PHP) des Gutenberg-Block
            ));

            acf_register_block_type(array(
                'name' => 'webdev_latestposts', // Interner Name
                'title' => __( 'Latest Posts', 'wifi' ), // Titel (Anzeigename)
                'description' => __( 'Letze Beiträge', 'wifi' ), // Beschreibung (wird im Editor bei der Blockauswahl angezeigt)
                'supports' => array('anchor' => true), // Ermöglicht bei den Block-Einstellungen eine ID (Anchor) einzufügen
                'category' => 'wifi',// in welcher Kategorie der Block erscheint - in diesem Fall in unserer eigenen Kategorie, die mit "add_action('block_categories_all'..)" angelegt wurde
                'keywords' => array('posts', 'beiträge', 'blog', 'news'), // optional für die Block-Suche im Editor
                'post_types' => array('page','posts'), // bei welchen Post-Types der Block angezeigt wird bzw. verwendet werden kann. In diesem Fall bei Seiten (page) und Beiträgen (post)
                'align' => false, // optional ( left, center, right, wide u. full)
                'mode' => false, // verhindert das Links im Editor nicht weiterleiten, sondern die Bearbeitung des ACF-Blocks erzwungen wird
                'icon' => 'pressthis', // https://developer.wordpress.org/resource/dashicons/#smiley
                'render_template' => 'template-parts/block-posts.php' // Pfad zum Template (HTML & PHP) des Gutenberg-Block
            ));


}

} );



}else {
    /* Backend-Fehlermeldung, wenn ACF-Pro nicht installiert ist
    * https://developer.wordpress.org/reference/hooks/admin_notices/
    * https://digwp.com/2016/05/wordpress-admin-notices/
    */
    add_action('admin_notices', function () {
        ?>
        <div class="error notice">
            <p><?php _e('ACHTUNG: Das Plugin "ACF Pro" muss installiert werden!', 'wifi'); ?></p>
        </div>
        <?php
    });
}
