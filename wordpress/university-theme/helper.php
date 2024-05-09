<?php
  function highlight_current(string $page_name) {
    $parent = get_page_by_path($page_name);
    // if page name is current page or if id of page is a parent of the current page
    if (is_page($page_name) or $parent ? $parent->ID === wp_get_post_parent_id(0): $parent) {
      echo 'class="current-menu-item"';
    }
  }
