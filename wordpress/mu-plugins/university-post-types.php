<?php

function uni_post_types() {
  // Custom Post Type: Event
  register_post_type('event', array(
    'capability_type' => 'event', // create new capability permissions for post type
    'map_meta_cap' => true, // automatically map the right capabilities
    'show_in_rest' => true,
    'supports' => array('title', 'editor', 'excerpt', 'custom-fields'),
    'rewrite' => array('slug' => 'event'), 
    'has_archive' => 'events',
    'public' => true,
    'labels' => array(
      'name' => 'Events',
      'add_new' => 'Add New Event',
      'add_new_item' => 'Add New Event',
      'edit_item' => 'Edit Event',
      'all_items' => 'All Events',
      'singular_name' => 'Event',
      'new_item' => 'New Event'
    ),
    'menu_icon' => 'dashicons-calendar'
  ));

  // Custom Post Tye: Program
  register_post_type('program', array(
    'show_in_rest' => true,
    'supports' => array('title', 'editor'),
    'rewrite' => array('slug' => 'program'), 
    'has_archive' => 'programs',
    'public' => true,
    'labels' => array(
      'name' => 'Programs',
      'add_new' => 'Add New Program',
      'add_new_item' => 'Add New Program',
      'edit_item' => 'Edit Program',
      'all_items' => 'All Programs',
      'singular_name' => 'Program',
      'new_item' => 'New Program'
    ),
    'menu_icon' => 'dashicons-awards'
  ));

  // Custom Post Tye: Professor
  register_post_type('professor', array(
    'show_in_rest' => true,
    'supports' => array('title', 'editor'),
    'public' => false,  // declare a private post type, (per user)
    'show_ui' => true, // to show in dashboard since it's a private post type
    'labels' => array(
      'name' => 'Professors',
      'add_new' => 'Add New Professor',
      'add_new_item' => 'Add New Professor',
      'edit_item' => 'Edit Professor',
      'all_items' => 'All Professors',
      'singular_name' => 'Professor',
      'new_item' => 'New Professor'
    ),
    'menu_icon' => 'dashicons-welcome-learn-more'
  ));

  // Custom Post Tye: Note
  register_post_type('note', array(
    'show_in_rest' => true,
    'supports' => array('title', 'editor', 'thumbnail'),
    'public' => true,
    'labels' => array(
      'name' => 'Notes',
      'add_new' => 'Add New Note',
      'add_new_item' => 'Add New Note',
      'edit_item' => 'Edit Note',
      'all_items' => 'All Notes',
      'singular_name' => 'Note',
      'new_item' => 'New Note'
    ),
    'menu_icon' => 'dashicons-welcome-write-blog'
  ));
}

add_action('init', 'uni_post_types');
