
<?= get_header() ?>
<h3><?= bloginfo('description') ?></h3>

<hr />

<!-- loop through all available posts -->
<?php while(have_posts()): ?>
    <?= the_post(); ?>
    <h2><a href=<?= the_permalink() ?> ><?= the_title() ?></a></h2>
    <p><?= the_content() ?></p>
    <hr />
<?php endwhile; ?>
<?= get_footer() ?>
