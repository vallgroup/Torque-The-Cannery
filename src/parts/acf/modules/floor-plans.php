<?php

$title   = get_sub_field( 'title' );
$content = get_sub_field( 'content' );
$cta     = get_sub_field( 'call_to_action' );
$floor_plans = get_sub_field( 'floor_plans' );

$section_module = do_shortcode( '[torque_slideshow id="'.$floor_plans->ID.'" type="post" template="cannery_floorplans" /]' );
?>

<?php include locate_template( '/parts/templates/' . 'page-section.php' ); ?>