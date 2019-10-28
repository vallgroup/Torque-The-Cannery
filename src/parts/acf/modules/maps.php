<?php

$title   = get_sub_field( 'title' );
$content = get_sub_field( 'content' );
$cta     = get_sub_field( 'call_to_action' );
$section_module = 'This is the section module';
$map = get_sub_field( 'map' );

?>

<?php include locate_template( '/parts/templates/' . 'page-section.php' ); ?>