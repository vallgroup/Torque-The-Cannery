<?php
/**
 * Displays the page sections, stacked.
 */

$modules = 'sections';
$modules_path = '/parts/acf/modules/';

if ( have_rows( $modules ) ):

  while ( have_rows( $modules ) ) : the_row();

    switch ( get_row_layout() ) {

      case "floor_plans" :

        include locate_template( $modules_path . 'floor-plans.php' );

      break;

      case "maps" :

        include locate_template( $modules_path . 'maps.php' );

      break;

      case "gallery" :

        include locate_template( $modules_path . 'gallery.php' );

      break;

      case "contact" :

        include locate_template( $modules_path . 'contact.php' );

      break;
    }

  endwhile;
endif;

?>
