<?php 


if(get_sub_field('type') == "") 
?>

<section class="hero-static_section">
    <div class="hero-static_container">
        <?php if (get_field('page_headline')) : ?>
            <h1><?php echo get_sub_field('page_headline') ?></h1>
        <?php endif; ?>

        <?php if (get_sub_field('page_subheadline')) : ?>
            <p><?php echo get_sub_field('page_subheadline') ?></p>
        <?php endif; ?>

        <img src="<?php echo get_sub_field("image")['url'] ?>" alt="">
    </div>
</section>