<?php
function highlight_current(string $page_name): void
{
  // global post
  global $post;
  $current_page_id = $post->ID;

  $page = get_page_by_path($page_name);
  // if page name is current page or if id of page is a parent of the current page
  if ($page && ($page->ID === wp_get_post_parent_id(0) or $page->ID === $current_page_id)) {
    echo 'class="current-menu-item"';
  }
}

function the_page_banner($subtitle='crickets...', $file='/images/ocean.jpg', $title='') {
  $banner_img = get_field('page_banner_bg_img');
  $the_title = $title ?: get_the_title();
  if ($banner_img) {
    $bg_image_url = $banner_img['sizes']['page-banner'];
  } else {
    $bg_image_url = get_theme_file_uri($file);
  }
  $banner_subtitle = get_field('page_banner_subtitle') ?: $subtitle;
  
  echo <<<HTML
  <div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url($bg_image_url)">
    </div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title">$the_title</h1>
      <div class="page-banner__intro">
        <p>$banner_subtitle</p>
      </div>
    </div>
  </div>
  HTML;
}
