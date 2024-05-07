
<body>
    <p style="position: absolute; right: 10px;"><a href=<?= admin_url() ?> > DASHBOARD </a></p>
    
    <h1><?= bloginfo('name'); ?></h1>
    <h3><?= bloginfo('description') ?></h3>
    
    <hr />
    
    <!-- loop through all available posts -->
    <?php while(have_posts()): ?>
        <?= the_post(); ?>
        <h2><a href=<?= the_permalink() ?> ><?= the_title() ?></a></h2>
        <p><?= the_content() ?></p>
        <hr />
    <?php endwhile; ?>
</body>
