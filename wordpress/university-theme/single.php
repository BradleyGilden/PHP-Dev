<!-- This is a template for posts -->
<body>
    <p style="position: absolute; right: 10px;"><a href=<?= admin_url() ?> > DASHBOARD </a></p>
    <?php while(have_posts()): ?>
        <?= the_post(); ?>
        <h2><?= the_title() ?></h2>
        <p><?= the_content() ?></p>
    <?php endwhile; ?>
</body>
