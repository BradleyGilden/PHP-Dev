<?php
  function highlight_current(string $page_name) {
    // global post
    global $post;
    $current_page_id = $post->ID;

    $page = get_page_by_path($page_name);
    // if page name is current page or if id of page is a parent of the current page

    if ($page && ($page->ID === wp_get_post_parent_id(0) or $page->ID === $current_page_id)) {
      return true;
    }

    return false;
  }
