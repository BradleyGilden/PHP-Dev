<?php
get_header();
the_page_banner('Explore our exciting courses and embark on a new journey', title: 'All Programs');
?>

<div class="container container--narrow page-section">
  <ul class="link-list min-list">
  <?php
  while (have_posts()) {
    the_post(); ?>
    <li><a href=<?php the_permalink(); ?>><?php the_title(); ?></a></li>
    <?php } ?>
  </ul>
</div>
<?php get_footer(); ?>
