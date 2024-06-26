<?php
    require_once get_template_directory() . '/helper.php';
    require_once get_template_directory() . '/search-route.php';

    function uni_resources() {
        // loads static resources
        wp_enqueue_script('jquery');
        wp_enqueue_script('main_script', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
        wp_enqueue_script_module('search_script', get_template_directory_uri() . '/src/index.js', array('jquery'), '1.0', true);
        wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
        wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
        wp_enqueue_style('main_styles', get_theme_file_uri('/build/style-index.css'));
        wp_enqueue_style('extra_styles', get_theme_file_uri('/build/index.css'));

        wp_localize_script('main_script', 'universityData', array(
            'root_url' => get_site_url(),
            'nonce' => wp_create_nonce('wp_rest')  // the nonce is used to authorize requests
        ));
    }

    function uni_features() {
        // adds page title to tab name
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_image_size('professor-landscape', 400, 260, true);
        add_image_size('professor-portrait', 480, 650, true);
        add_image_size('page-banner', 1500, 350, true);
        // register nav menu location with wordpress
        // register_nav_menu('headerMenuLocation', 'Header Menu Location');
        // register_nav_menu('footerLocationOne', 'Footer Location One');
        // register_nav_menu('footerLocationTwo', 'Footer Location Two');
    }

    // function uni_post_types() {
    //     register_post_type('event', array(
    //         'public' => true,
    //         'labels' => array(
    //             'name' => 'Events'
    //         ),
    //         'menu_icon' => 'dashicons-calendar'
    //     ));
    // }

    // wp_enqueue_scripts for loading static files
    add_action('wp_enqueue_scripts', 'uni_resources');

    add_action('after_setup_theme', 'uni_features');

    // add_action('init', 'uni_post_types');


    // this custom function is used to modify queries for the custom event type archives
    function uni_query_mod($query) {
        // Modify Program Query
        if (!is_admin() && is_post_type_archive('program') && $query->is_main_query()) {
            $query->set('orderby', 'title');
            $query->set('order', 'ASC');
            $query->set('posts_per_page', -1);
        }

        // Modify Event Query
        if (!is_admin() && is_post_type_archive('event') && $query->is_main_query()) {
            $query->set('meta_key', 'event_date');
            $query->set('orderby', 'meta_value');
            $query->set('order', 'ASC');
            $query->set('meta_query', array(
                array(
                    'key' => 'event_date',
                    'value' => '2024-07-19', // hypothetically this date has been already passed
                    'compare' => '>=',
                    'type' => 'DATE'
                )
            ));
        }
    }

    add_action('pre_get_posts', 'uni_query_mod');


    function custom_api_fields() {
        // (post type, field name, ...)
        register_rest_field('post', 'authorName', array(
            'get_callback' => function () { return get_the_author(); } // function that returns value for field
        ));
    }

    add_action('rest_api_init', 'custom_api_fields');

    function redirect_subs_to_frontend() {
        $currentUser = wp_get_current_user();
        if (count($currentUser->roles) == 1 && $currentUser->roles[0] === 'subscriber') {
            wp_redirect(site_url('/'));
            exit;
        }
    }
    add_action('admin_init', 'redirect_subs_to_frontend');

    // remove editor bar from site for non admins

    function remove_subs_admin_bar() {
        $currentUser = wp_get_current_user();
        if (count($currentUser->roles) == 1 && $currentUser->roles[0] === 'subscriber') {
            show_admin_bar(false);
        }
    }
    add_action('wp_loaded', 'remove_subs_admin_bar');

    // change url of wordpress icon

    function custom_header_url() {
        return esc_url(site_url("/"));
    }

    add_filter('login_headerurl', 'custom_header_url');

    // custom css for login page

    // function login_css() {
    //     wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    //     wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    //     wp_enqueue_style('main_styles', get_theme_file_uri('/build/style-index.css'));
    //     wp_enqueue_style('extra_styles', get_theme_file_uri('/build/index.css'));
    // }

    // add_action('login_enqueue_scripts', 'login_css');
?>
