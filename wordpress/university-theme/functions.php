<?php

    function uni_resources() {
        wp_enqueue_style('main_styles', get_stylesheet_uri());
    }

    // wp_enqueue_scripts for loading static files
    add_action('wp_enqueue_scripts', 'uni_resources');
?>
