<?php

    function uni_resources() {
        // loads static resources
        wp_enqueue_script('main_script', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
        wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
        wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
        wp_enqueue_style('main_styles', get_theme_file_uri('/build/style-index.css'));
        wp_enqueue_style('extra_styles', get_theme_file_uri('/build/index.css'));
    }

    function uni_features() {
        // adds page title to tab name
        add_theme_support('title-tag');
        // register nav menu location with wordpress
        register_nav_menu('headerMenuLocation', 'Header Menu Location');
        register_nav_menu('footerLocationOne', 'Footer Location One');
        register_nav_menu('footerLocationTwo', 'Footer Location Two');
    }

    // wp_enqueue_scripts for loading static files
    add_action('wp_enqueue_scripts', 'uni_resources');

    add_action('after_setup_theme', 'uni_features');
?>
