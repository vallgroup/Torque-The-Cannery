<?php wp_head(); ?>

<?php get_template_part( 'parts/shared/mobile', 'header' ); ?>

<main>

	<?php get_template_part('/parts/acf/modules'); ?>

</main>

<?php wp_footer(); ?>