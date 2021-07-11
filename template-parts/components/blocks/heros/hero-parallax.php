<section class="hero-parallax_section">
    <div class="hero-parallax_container parallax" style="background-image: url(<?php echo get_sub_field("image")['url'] ?>)">
        <?php if (get_sub_field('page_headline')) : ?>
            <h1><?php echo get_sub_field('page_headline') ?></h1>
        <?php endif; ?>

        <?php if (get_sub_field('page_subheadline')) : ?>
            <p><?php echo get_sub_field('page_subheadline') ?></p>
        <?php endif; ?>

        <?php if (get_sub_field('link')) : ?>
            <a href="<?php echo esc_url(get_sub_field('link')['url']) ?>"><?php echo esc_html(get_sub_field('link')['title']) ?></a>
        <?php endif; ?>
    </div>
</section>