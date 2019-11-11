<?php
/**
 * Outputs the header phone number
 */

$phone = get_field("phone_number", "option");
$phone_text = get_field("phone_number_text", "option");

 ?>
<div class="mobile-header">

	<div class="mobile-header-navigation">

		<div class="mobile-header-navigation-toggle">
			<a href="#toggle-nav">
				<div class="mobile-header-navigation-toggle-text">
					<strong>Menu</strong>
				</div>
				<div class="mobile-header-navigation-toggle-icon">
					<img src="<?php echo get_stylesheet_directory_uri() . '/statics/images/hamburger/hamburger.png' ?>">
				</div>
			</a>
		</div>

		<div class="mobile-header-navigation-nav">
			<?php The_Cannery_Nav_Menus::show_mobile_nav(); ?>
		</div>
	</div>


	<div class="top-cta">
		<div class="phone-number">
			<strong><?php echo esc_html( $phone_text ) ?> </strong>
			<a href="<?php echo esc_url( 'tel:' . $phone ) ?>"><?php echo esc_html( $phone ); ?></a>
		</div>
	</div>
</div>