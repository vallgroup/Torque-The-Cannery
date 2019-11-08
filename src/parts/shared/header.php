<?php
/**
 * Outputs the header phone number
 */

$phone = get_field("phone_number", "option");
$phone_text = get_field("phone_number_text", "option");

 ?>
<div class="top-cta">
	<div class="phone-number">
		<strong><?php echo esc_html( $phone_text ) ?> </strong>
		<a href="<?php echo esc_url( 'tel:' . $phone ) ?>"><?php echo esc_html( $phone ); ?></a>
	</div>
</div>