<?php

$title   = get_sub_field( 'title' );
$content = get_sub_field( 'content' );
$cta     = get_sub_field( 'call_to_action' );

$num_rows = get_sub_field( 'gallery_rows' );

ob_start();
?><div class="row gallery-module" >
  <div class="gallery-grid-root grid-rows-<?php echo $num_rows; ?>" ><?php
if( have_rows('images') ) {
  while( have_rows('images') ) { the_row();

    $image = get_sub_field('image');

    $caption = $image['caption'];
    $src = $image['url'];

    $col_start = get_sub_field('column_start');
    $col_end = get_sub_field('column_end');
    $row_start = get_sub_field('row_start');
    $row_end = get_sub_field('row_end');
    $width = intval($col_end) - intval($col_start);
    $height = intval($row_end) - intval($row_start);

    ?>

    <div class="
      grid-image
      grid-column-<?php echo $col_start; ?>-<?php echo $width; ?>
      grid-row-<?php echo $row_start; ?>-<?php echo $height; ?>
      grid-width-<?php echo $width; ?>
      grid-height-<?php echo $height; ?>
    ">

      <img src="<?php echo $src; ?>" />

      <?php if ($caption) { ?>
        <div class="caption-overlay">
          <?php echo $caption; ?>
        </div>
      <?php } ?>

    </div>

    <?php
  }
}
?></div>
</div><?php

$section_module = ob_get_clean();

include locate_template('/parts/templates/' . 'page-section.php');
?>