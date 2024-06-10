<?php
function custom_api_routes() {
  // registering custom route
  register_rest_route('university/v1', 'search', array(
    'methods' => WP_REST_Server::READABLE, // constant for 'GET' request
    'callback' => 'university_search_results',
  ));
}

// use wordpress query to get required data for pauload response
function university_search_results($data) {
  $mainQuery = new WP_Query(array(
    'post_type' => array('professor', 'post', 'page', 'program', 'event'),
    // 's' is the search field, sanitize is security measure to prevent sql injections
    's' => sanitize_text_field($data['term'])
  ));

  $results = array(
    'general_info' => array(),
    'professors' => array(),
    'programs' => array(),
    'events' => array()
  );
  while($mainQuery->have_posts()) {
    $mainQuery->the_post();
    if (get_post_type() === 'post' || get_post_type() === 'page') {
      array_push($results['general_info'], array(
        'title' => get_the_title(),
        'permalink' => get_the_permalink()
      ));
    }
    else {
      array_push($results[get_post_type() . 's'], array(
        'title' => get_the_title(),
        'permalink' => get_the_permalink()
      ));
    }
  }
  return $results;
}

add_action('rest_api_init', 'custom_api_routes');
