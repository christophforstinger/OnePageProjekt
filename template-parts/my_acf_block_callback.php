<?php
function my_acf_block_render_callback( $block, $content ) {
    // Erhalten Sie den Wert des Feldes "Überschrift" des aktuellen Blocks
    $heading = get_field( 'heading' );

    // Erhalten Sie den Wert des Feldes "Text" des aktuellen Blocks
    $text = get_field( 'text' );

    // Wenn die Überschrift und der Text vorhanden sind, zeigen Sie sie an
    if ( $heading && $text ) {
        echo '<h2>' . esc_html( $heading ) . '</h2>';
        echo '<div>' . wp_kses_post( $text ) . '</div>';
    }
}