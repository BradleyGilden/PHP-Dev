<!-- This is a template for pages -->

<body>
  <?php
  if (!is_user_logged_in()) {
    wp_redirect(site_url('/'));
  }
  get_header();
  while (have_posts()) {
    the_post();
    the_page_banner();
    ?>

    <div class="container container--narrow page-section">
      
    </div>
  <?php }
  get_footer();
  ?>
</body>
