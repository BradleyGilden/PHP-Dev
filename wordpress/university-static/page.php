<!-- This is a template for pages -->

<body>
  <?php
  get_header();
  while (have_posts()) {
    the_post();
    the_page_banner();
    ?>

    <div class="container container--narrow page-section">
      <?php $parent_id = wp_get_post_parent_id(get_the_ID());
      //  if the current page has a parent
      if ($parent_id) { ?>
      <div class="metabox metabox--position-up metabox--with-home-link">
        <p>
          <a class="metabox__blog-home-link" href="<?php echo get_permalink($parent_id) ?>"><i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title($parent_id); ?></a> <span class="metabox__main"><?php echo the_title(); ?></span>
        </p>
      </div>
      <?php } ?>

      <!-- links get styled differently depending on which page it is on using .current_page_item class, which is a built in class -->
      <div class="page-links">
      <?php
        $absolute_parent = $parent_id ? $parent_id : get_the_ID(); 
        $has_children = get_pages(array( 'child_of' => get_the_ID() ));
        // if page has children or has parent
        if ($parent_id or $has_children) {
      ?>
        <h2 class="page-links__title"><a href="<?php echo get_permalink($absolute_parent) ?>"><?php echo get_the_title($absolute_parent); ?></a></h2>
        <ul class="min-list">
          <?php 
        }
          wp_list_pages( array(
            'title_li' => NULL,
            'child_of' => $absolute_parent
          ));
          ?>
        </ul>
      </div>

      <div class="generic-content">
        <p><?= the_content() ?></p>
      </div>
    </div>
  <?php }
  get_footer();
  ?>
</body>
