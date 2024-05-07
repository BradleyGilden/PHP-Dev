<h1><?= bloginfo('name'); ?></h1>
<h3><?= bloginfo('description') ?></h3>

<hr />

<?php while(have_posts()): ?>
    <?= the_post(); ?>
    <h2><?= the_title() ?></h2>
    <p><?= the_content() ?></p>
    <hr />
<?php endwhile; ?>
