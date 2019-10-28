<?php

$title   = get_sub_field( 'title' );
$content = get_sub_field( 'content' );
$cta     = get_sub_field( 'call_to_action' );
$map = get_sub_field( 'map' );

$section_module = do_shortcode('[torque_map map_id="'.$map->ID.'"]');

?>

<?php include locate_template( '/parts/templates/' . 'page-section.php' ); ?>