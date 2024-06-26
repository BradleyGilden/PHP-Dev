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
    'generalInfo' => array(),
    'professors' => array(),
    'programs' => array(),
    'events' => array()
  );
  while($mainQuery->have_posts()) {
    $mainQuery->the_post();
    $post_type = get_post_type();
    if ($post_type === 'post' || $post_type === 'page') {
      array_push($results['generalInfo'], array(
        'title' => get_the_title(),
        'permalink' => get_the_permalink(),
        'type' => $post_type,
        'authorName' => get_the_author()
      ));
    }
    elseif ($post_type === 'professor') {
      array_push($results['professors'], array(
        'title' => get_the_title(),
        'permalink' => get_the_permalink(),
        'imageUrl' => get_the_post_thumbnail_url(0, 'professor-landscape'),
      ));
    }
    elseif ($post_type === 'event') {
      $event_date = new DateTime(get_field('event_date'));
      array_push($results['events'], array(
        'title' => get_the_title(),
        'permalink' => get_the_permalink(),
        'day' => $event_date->format('d'),
        'month' => $event_date->format('M'),
        'excerpt' => has_excerpt() ? get_the_excerpt() : wp_trim_words(get_the_content(), 18)
      ));
    }
    else {
      array_push($results[$post_type . 's'], array(
        'title' => get_the_title(),
        'permalink' => get_the_permalink()
      ));
    }
  }
  return $results;
}

add_action('rest_api_init', 'custom_api_routes');
