<section class="gallery_section">
    <div class="gallery_container">
        <h2>Gallery Block</h2>
        <?php if (get_sub_field('headline')) : ?>
            <h2><?php echo get_sub_field('headline') ?></h2>
        <?php endif; ?>

        <?php if (get_sub_field('subheadline')) : ?>
            <p><?php echo get_sub_field('subheadline') ?></p>
        <?php endif; ?>

    </div>
</section>