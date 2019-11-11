<?php

$title          = get_sub_field( 'title' );
$content        = get_sub_field( 'content' );
$cta            = get_sub_field( 'call_to_action' );
$top_img        = get_sub_field( 'top_image' );
$name           = get_sub_field( 'name' );
// $contact_info   = get_sub_field( 'contact_info' );
$logo           = get_sub_field( 'logo' );
$address_1      = get_sub_field( 'address_1' );
$address_2      = get_sub_field( 'address_2' );
// $social_icons   = get_sub_field( 'social_icons' );

ob_start(); ?>
<div class="contact">
  <?php if ($top_img) : ?>
    <div class="contact-banner-container">
        <div class="contact-banner" style="background-image: url(<?php echo esc_url($top_img); ?>)"></div>
    </div>
  <?php endif; ?>

  <div class="contact-name-container">
    <?php if ($name) { ?>
      <h2 class="contact-name"><?php echo esc_html($name); ?></h2>
    <?php } ?>
  </div>

  <div class="contact-content-container">

      <div class="contact-info-container">
        <?php if ( have_rows('contact_info') ) :
          while ( have_rows('contact_info') ): the_row();
            $type = get_sub_field( 'type' );
            $text = get_sub_field( 'text' );
            $link = get_sub_field( 'link' ); ?>
            <div class="contact-info-item">
              <img class="contact-info-icon icon-<?php echo esc_attr( $type ); ?>" src="/wp-content/themes/the-cannery/statics/images/<?php echo esc_attr( $type ); ?>-icon.png" alt="<?php echo esc_attr( $type ); ?>" />
              <a href="<?php echo esc_html( $link ); ?>" class="contact-info-text"><?php echo esc_html( $text ); ?></a>
            </div>
          <?php endwhile;
        endif; ?>
      </div>

      <div class="contact-logo-container">
        <?php if ($logo) { ?>
          <img class="contact-logo" src="<?php echo esc_url( $logo ); ?>" alt="logo"/>
        <?php } ?>
      </div>

  </div>

  <div class="contact-content-container address">

      <div class="contact-address-container">
      <?php if ($address_1) { ?>
          <span class="contact-address-one"><?php echo esc_html( $address_1 ); ?></span>
      <?php } ?>
      <?php if ($address_2) { ?>
          <span class="contact-address-two"><?php echo esc_html( $address_2 ); ?></span>
      <?php } ?>
      </div>

      <div class="contact-social-container">
      <?php if ( have_rows('social_icons') ):
          while ( have_rows('social_icons') ): the_row();
              $icon = get_sub_field( 'icon' );
              $link = get_sub_field( 'link' ); ?>
              <a class="contact-social-icon" href="<?php echo esc_url($link); ?>" target="_blank">
                  <img src="<?php echo esc_url($icon); ?>" alt="<?php echo esc_url($link); ?>"/>
              </a>
          <?php endwhile;
      endif; ?>
      </div>

  </div>
</div>
<?php

$section_module = ob_get_clean();
// Send section data through to page template
include locate_template( '/parts/templates/' . 'page-section.php' );
?>
