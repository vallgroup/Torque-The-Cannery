 <section class="section fullpage">

 	<?php get_template_part( 'parts/shared/header' ); ?>

	<div class="section-inner">

		<!-- sidebar -->
		<div class="section-sidebar">
			<div class="section-sidebar-logo">
				<?php get_template_part( 'parts/shared/logo', 'dark'); ?>
			</div>

			<div class="section-sidebar-content">
				<div class="section-sidebar-content-title">
					<div class="section-sidebar-content-title-vertical">
						<h2><?php echo esc_html( $title ); ?></h2>
					</div>
				</div>
				<div class="section-sidebar-content-wysiwyg">
					<?php echo $content; ?>
				</div>
				<div class="section-sidebar-content-cta">
					<?php if ( ! empty( $cta['title'] )
						&& ! empty( $cta['url'] ) ) : ?>
						<a href="<?php echo esc_url( $cta['url'] ); ?>">
							<?php echo esc_html( $cta['title'] ); ?>
						</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<!-- /sidebar -->

		<!-- Content -->
		<div class="section-content">
			<div class="section-content-inner">
				<div class="section-content-navigation">
					<?php The_Cannery_Nav_Menus::show_nav_menu(); ?>
				</div>
			</div>
			<div class="section-module">
				<?php echo $section_module; ?>
			</div>
		</div>
		<!-- /Content -->
	</div>

</section>