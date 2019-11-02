<?php

/**
 * Used to render all images from a given category, in a pre-defined masonry grid layout
 */

$title   = get_sub_field('title');
$content = get_sub_field('content');
$cta     = get_sub_field('call_to_action');
$gallery_layout = get_sub_field('gallery_layout');
$gallery_images = get_sub_field('gallery_images');

$section_module = '';

if ($gallery_images && $gallery_layout) {
    // Open gallery container
    $section_module .= '<div class="gallery-wrapper" >';

    // Define the grid sections, based on pre-defined designs provided by client
    if ($gallery_layout === 'layout_one') {
        $grid_sections = array(
            array(
                'num_rows'        => '2',
                'num_items'       => 3,
                'items'           => array(
                    array(
                        'column_start'  => '0',
                        'column_end'    => '6',
                        'row_start'     => '0',
                        'row_end'       => '1',
                    ),
                    array(
                        'column_start'  => '6',
                        'column_end'    => '12',
                        'row_start'     => '0',
                        'row_end'       => '2',
                    ),
                    array(
                        'column_start'  => '0',
                        'column_end'    => '6',
                        'row_start'     => '1',
                        'row_end'       => '2',
                    ),
                ),
            ),
            array(
                'num_rows'        => '2',
                'num_items'       => 3,
                'items'           => array(
                    array(
                        'column_start'  => '0',
                        'column_end'    => '4',
                        'row_start'     => '0',
                        'row_end'       => '1',
                    ),
                    array(
                        'column_start'  => '0',
                        'column_end'    => '4',
                        'row_start'     => '1',
                        'row_end'       => '2',
                    ),
                    array(
                        'column_start'  => '4',
                        'column_end'    => '12',
                        'row_start'     => '0',
                        'row_end'       => '2',
                    ),
                ),
            ),
            array(
                'num_rows'        => '1',
                'num_items'       => 2,
                'items'           => array(
                    array(
                        'column_start'  => '0',
                        'column_end'    => '4',
                        'row_start'     => '0',
                        'row_end'       => '1',
                    ),
                    array(
                        'column_start'  => '4',
                        'column_end'    => '12',
                        'row_start'     => '0',
                        'row_end'       => '1',
                    ),
                ),
            ),
            array(
                'num_rows'        => '2',
                'num_items'       => 3,
                'items'           => array(
                    array(
                        'column_start'  => '0',
                        'column_end'    => '8',
                        'row_start'     => '0',
                        'row_end'       => '2',
                    ),
                    array(
                        'column_start'  => '8',
                        'column_end'    => '12',
                        'row_start'     => '0',
                        'row_end'       => '1',
                    ),
                    array(
                        'column_start'  => '8',
                        'column_end'    => '12',
                        'row_start'     => '1',
                        'row_end'       => '2',
                    ),
                ),
            ),
        );
    } elseif ($gallery_layout === 'layout_two') {
        $grid_sections = array(
            array(
                'num_rows'        => '2',
                'num_items'       => 3,
                'items'           => array(
                    array(
                        'column_start'  => '0',
                        'column_end'    => '12',
                        'row_start'     => '0',
                        'row_end'       => '1',
                    ),
                    array(
                        'column_start'  => '0',
                        'column_end'    => '6',
                        'row_start'     => '1',
                        'row_end'       => '2',
                    ),
                    array(
                        'column_start'  => '6',
                        'column_end'    => '12',
                        'row_start'     => '1',
                        'row_end'       => '2',
                    ),
                ),
            ),
            array(
                'num_rows'        => '2',
                'num_items'       => 3,
                'items'           => array(
                    array(
                        'column_start'  => '0',
                        'column_end'    => '4',
                        'row_start'     => '0',
                        'row_end'       => '1',
                    ),
                    array(
                        'column_start'  => '0',
                        'column_end'    => '4',
                        'row_start'     => '1',
                        'row_end'       => '2',
                    ),
                    array(
                        'column_start'  => '4',
                        'column_end'    => '12',
                        'row_start'     => '0',
                        'row_end'       => '2',
                    ),
                ),
            ),
            array(
                'num_rows'        => '1',
                'num_items'       => 2,
                'items'           => array(
                    array(
                        'column_start'  => '0',
                        'column_end'    => '4',
                        'row_start'     => '0',
                        'row_end'       => '1',
                    ),
                    array(
                        'column_start'  => '4',
                        'column_end'    => '12',
                        'row_start'     => '0',
                        'row_end'       => '1',
                    ),
                ),
            ),
            array(
                'num_rows'        => '2',
                'num_items'       => 3,
                'items'           => array(
                    array(
                        'column_start'  => '0',
                        'column_end'    => '8',
                        'row_start'     => '0',
                        'row_end'       => '2',
                    ),
                    array(
                        'column_start'  => '8',
                        'column_end'    => '12',
                        'row_start'     => '0',
                        'row_end'       => '1',
                    ),
                    array(
                        'column_start'  => '8',
                        'column_end'    => '12',
                        'row_start'     => '1',
                        'row_end'       => '2',
                    ),
                ),
            ),
        );
    } elseif ($gallery_layout === 'layout_three') {
        $grid_sections = array(
            array(
                'num_rows'        => '2',
                'num_items'       => 3,
                'items'           => array(
                    array(
                        'column_start'  => '0',
                        'column_end'    => '6',
                        'row_start'     => '0',
                        'row_end'       => '1',
                    ),
                    array(
                        'column_start'  => '6',
                        'column_end'    => '12',
                        'row_start'     => '0',
                        'row_end'       => '2',
                    ),
                    array(
                        'column_start'  => '0',
                        'column_end'    => '6',
                        'row_start'     => '1',
                        'row_end'       => '2',
                    ),
                ),
            ),
            array(
                'num_rows'        => '2',
                'num_items'       => 3,
                'items'           => array(
                    array(
                        'column_start'  => '0',
                        'column_end'    => '4',
                        'row_start'     => '0',
                        'row_end'       => '1',
                    ),
                    array(
                        'column_start'  => '0',
                        'column_end'    => '4',
                        'row_start'     => '1',
                        'row_end'       => '2',
                    ),
                    array(
                        'column_start'  => '4',
                        'column_end'    => '12',
                        'row_start'     => '0',
                        'row_end'       => '2',
                    ),
                ),
            ),
            array(
                'num_rows'        => '1',
                'num_items'       => 2,
                'items'           => array(
                    array(
                        'column_start'  => '0',
                        'column_end'    => '4',
                        'row_start'     => '0',
                        'row_end'       => '1',
                    ),
                    array(
                        'column_start'  => '4',
                        'column_end'    => '12',
                        'row_start'     => '0',
                        'row_end'       => '1',
                    ),
                ),
            ),
            array(
                'num_rows'        => '2',
                'num_items'       => 3,
                'items'           => array(
                    array(
                        'column_start'  => '0',
                        'column_end'    => '8',
                        'row_start'     => '0',
                        'row_end'       => '2',
                    ),
                    array(
                        'column_start'  => '8',
                        'column_end'    => '12',
                        'row_start'     => '0',
                        'row_end'       => '1',
                    ),
                    array(
                        'column_start'  => '8',
                        'column_end'    => '12',
                        'row_start'     => '1',
                        'row_end'       => '2',
                    ),
                ),
            ),
        );
    }

    if ($grid_sections !== '') {
        // Count grid sections. Used to loop back to the first grid section if we reach the maximum number of grid sections.
    $grid_sections_count = count($grid_sections);

    // Count total number of gallery images
    $total_num_images = count($gallery_images);



    // Set initial vars
    $grid_section_index = 0;
    $gallery_image_index = 0;
    $total_images_rendered = 0;

    // Loop through each post, and display in corresponding grid item (based on rows and items defined above)
    foreach ($gallery_images as $image) {

        // Check if we're starting a new row. 
        if ($gallery_image_index == 0) {
            // START A NEW GRID ROW
            $section_module .= '<div class="row gallery-module" >';
            $section_module .= '<div class="gallery-grid-root grid-rows-' . $grid_sections[$grid_section_index]["num_rows"] . '" >';
        }

        // Assign grid item vars
        $col_start = $grid_sections[$grid_section_index]['items'][$gallery_image_index]['column_start'];
        $col_end = $grid_sections[$grid_section_index]['items'][$gallery_image_index]['column_end'];
        $row_start = $grid_sections[$grid_section_index]['items'][$gallery_image_index]['row_start'];
        $row_end = $grid_sections[$grid_section_index]['items'][$gallery_image_index]['row_end'];
        $width = intval($col_end) - intval($col_start);
        $height = intval($row_end) - intval($row_start);

        // Get ACF data
        $src = $image['sizes']['large'];

        $section_module .= '<div class="
            grid-image
            grid-column-' . $col_start . '-' . $width . '
            grid-row-' . $row_start . '-' . $height . '
            grid-width-' . $width . '
            grid-height-' . $height . '
        ">
            <div class="grid-image-container" style="background-image: url(' . $src . ')"></div>
        </div>';

        // Increment vars where required...
        // Increment total rendered images counter
        $total_images_rendered++;

        // if we've hit the max allowable items per current section, so increment the grid section counter and reset the image counter
        if ($gallery_image_index >= (intval($grid_sections[$grid_section_index]['num_items']) - 1)) {
            $grid_section_index++;
            $gallery_image_index = 0;

            // END THE GRID ROW
            $section_module .= '</div>';
            $section_module .= '</div>';

            // check if we're rendered all available images... 
        } elseif ($total_images_rendered >= $total_num_images) {
            // if so, close the row container div!
            // END THE GRID ROW
            $section_module .= '</div>';
            $section_module .= '</div>';
        } else {
            $gallery_image_index++;
        }

        // if we've hit the maximum number of grid sections
        if ($grid_section_index >= $grid_sections_count) {
            // reset the grid section index, as we've filled out all the sections and need to start over again!
            $grid_section_index = 0; // Skip the first row, as it is designed to fit the title section therefore not required!
            $gallery_image_index = 0;
        }
    }

    /* Restore original Post Data */
    wp_reset_postdata();

    // Close gallery container
    $section_module .= '</div>';
    }
}

// Now send the $section_module through to the page template
include locate_template('/parts/templates/' . 'page-section.php');
