<?php

function uni_post_types() {
  register_post_type('event', array(
    'show_in_rest' => true,      // show modern editor
    'supports' => array('title', 'editor', 'excerpt', 'custom-fields'),
    'rewrite' => array('slug' => 'event'), 
    'has_archive' => 'events',
    'public' => true,
    'labels' => array(
      'name' => 'Events',
      'add_new_item' => 'Add New Event',
      'edit_item' => 'Edit Event',
      'all_items' => 'All Events',
      'singular_name' => 'Event',
      'new_item' => 'New Event'
    ),
    'menu_icon' => 'dashicons-calendar'
  ));
}

add_action('init', 'uni_post_types');
