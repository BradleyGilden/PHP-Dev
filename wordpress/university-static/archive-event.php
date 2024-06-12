<!-- Create an archive for custom blog feeds when searching author or category -->

<?php
get_header();
the_page_banner("See what's going on in our World", title: "Upcoming Events");
?>
<div class="container container--narrow page-section">
  <?php
  while (have_posts()) {
    the_post(); ?>
      <div class="event-summary">
        <?php
          $event_date = new DateTime(get_field('event_date'));
        ?>
        <a class="event-summary__date event-summary__date--blue t-center" href="#">
          <span class="event-summary__month"><?php echo $event_date->format('M'); ?></span>
          <span class="event-summary__day"><?php echo $event_date->format('d'); ?></span>
        </a>
        <div class="event-summary__content">
          <h5 class="event-summary__title headline headline--tiny"><a href=<?php the_permalink(); ?>><?php the_title(); ?></a></h5>
          <p><?php echo wp_trim_words(get_the_content(), 18); ?> <a href=<?php the_permalink(); ?> class="nu gray">Read more</a></p>
        </div>
      </div>
    <?php } ?>

    <hr class="section-break"/>

    <p>Looking for a recap of our past events? <a href=<?php echo site_url('/past-events') ?>>Check out our past events archive</a></p>
</div>
<?php get_footer(); ?>
