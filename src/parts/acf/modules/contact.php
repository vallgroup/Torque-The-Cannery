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

$section_module = '';

// Image banner
if ($top_img) {
    $section_module .= '<div class="contact-banner-container">
        <div class="contact-banner" style="background-image: url(' . $top_img . ')"></div>
    </div>';
}

// Open content container
$section_module .= '<div class="contact-content-container">';

    // Name container
    $section_module .= '<div class="contact-name-container">';
    if ($name) {
        $section_module .= '<h2 class="contact-name">' . $name . '</h2>';
    }
    $section_module .= '</div>';

    // Contact info container
    $section_module .= '<div class="contact-info-container">';
    if ( have_rows('contact_info') ):
        while ( have_rows('contact_info') ): the_row();
            $type = get_sub_field( 'type' );
            $text = get_sub_field( 'text' );
            $link = get_sub_field( 'link' );
            $section_module .= '<div class="contact-info-item">';
                $section_module .= $type . ' ' . $text . ' ' . $link;
            $section_module .= '</div>';
        endwhile;
    endif;
    $section_module .= '</div>';

    // Contact info container
    $section_module .= '<div class="contact-logo-container">';
    if ($logo) {
        $section_module .= '<img class="contact-logo" src="' . $logo . '" alt="logo"/>';
    }
    $section_module .= '</div>';

// Close content container
$section_module .= '</div>';


// Open second content container
$section_module .= '<div class="contact-content-container">';

    // Address container
    $section_module .= '<div class="contact-address-container">';
    if ($address_1) {
        $section_module .= '<span class="contact-address-one">' . $address_1 . '</span>';
    }
    if ($address_2) {
        $section_module .= '<span class="contact-address-one">' . $address_2 . '</span>';
    }
    $section_module .= '</div>';

    // Social icons container
    $section_module .= '<div class="contact-social-container">';
    if ( have_rows('social_icons') ):
        while ( have_rows('social_icons') ): the_row();
            $icon = get_sub_field( 'icon' );
            $link = get_sub_field( 'link' );
            $section_module .= '<a class="contact-info-item" href="' . $link . '">';
                $section_module .= '<img src="' . $icon . '"/>';
            $section_module .= '</a>';
        endwhile;
    endif;
    $section_module .= '</div>';

// Close second content container
$section_module .= '</div>';

// Send section data through to page template
include locate_template( '/parts/templates/' . 'page-section.php' );
?>
