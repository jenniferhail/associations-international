<?php

    //======================================================================
    // Checking if FacetWP is Activated
    //======================================================================
    function facetwp_activated() {
        if (function_exists('facetwp_display')) {
            return true;
        }

        return false;
    }

    //======================================================================
    // Checking if ACF is Activated
    //======================================================================
    function acf_activated() {
        if (function_exists('get_field')) {
            return true;
        }

        return false;
    }

    //======================================================================
    // ACF Responsive Image
    //======================================================================
    function acf_responsive_image($image_id, $image_size, $max_width) {

        // check the image ID is not blank
        if ($image_id != '') {

            // set the default src image size
            $image_src = wp_get_attachment_image_url($image_id, $image_size);

            // set the srcset with various image sizes
            $image_srcset = wp_get_attachment_image_srcset($image_id, $image_size);

            // generate the markup for the responsive image
            echo 'src="' . $image_src . '" srcset="' . $image_srcset . '" sizes="(max-width: ' . $max_width . ') 100vw, ' . $max_width . '"';
        }
    }
