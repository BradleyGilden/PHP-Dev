<!-- Create an archive for past events -->

<?php get_header(); ?>

<div class="container container--narrow page-section">
  <?php
  $past_events = new WP_Query(array(
    'paged' => get_query_var('paged', 1),
    'posts_per_page' => 1,
    'post_type' => 'event',
    'meta_key' => 'event_date',
    'orderby' => 'meta_value',
    'order' => 'ASC',
    'meta_query' => array(
      array(
        'key' => 'event_date',
        'value' => '2024-07-19', // hypothetically this date has been already passed
        'compare' => '<',
        'type' => 'DATE'
      )
    )
  ));
  while ($past_events->have_posts()) {
    $past_events->the_post(); ?>
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
    <?php }
    echo paginate_links(array(
      'total' => $past_events->max_num_pages,
      'prev_text' => __('« Prev'),
      'next_text' => __('Next »')
    ));
    ?>
</div>
<?php get_footer(); ?>
