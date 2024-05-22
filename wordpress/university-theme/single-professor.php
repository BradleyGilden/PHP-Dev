<!-- This is a template for posts -->
<?php
require_once('helper.php');

get_header();

while (have_posts()) :
  the_post(); 
  the_page_banner();
  ?>

  <div class="container container--narrow page-section">
    <div class="generic-content">
      <div class="row group">
        <div class="one-third">
          <?php the_post_thumbnail('professor-portrait'); ?>
        </div>
        <div class="two-thirds">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
    <?php
    // get all related programs for this event
    $related_programs = get_field('related_program');
    if ($related_programs) {
      echo '<hr class="section-break" />';
      echo '<h2 class="headline headline--medium">Subject(s) Taught</h2>';
      echo '<ul class="link-list min-list">';
      foreach ($related_programs as $program) { ?>
        <li><a href=<?php echo get_the_permalink($program) ?>><?php echo get_the_title($program) ?></a></li>
    <?php
      }
    }
    echo '</ul>'
    ?>
  </div>
<?php
  get_footer();
endwhile;
?>
</body>
