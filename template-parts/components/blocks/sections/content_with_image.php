<!-- 

Things to add:

    Conditional for either headline/subheadline or a full wysiwyg to prevent the wysiwyg taking up a ton of space and not being as non dev friendly

 -->


<section class="content_with_image_section">
    <div class="content_with_image_container">
        <?php if (get_sub_field('section_headline')) : ?>
            <h2><?php echo get_sub_field('section_headline') ?></h2>
        <?php endif; ?>

        <?php if (get_sub_field('section_subheadline')) : ?>
            <p><?php echo get_sub_field('section_subheadline') ?></p>
        <?php endif; ?>
        <?php if (get_sub_field('image_side') == 'left') : ?>
            <div class="content_with_image_image">
                <img src="<?php echo get_sub_field('image')['url'] ?>" alt="">
            </div>

            <div class="content_with_image_content">
                <?php the_sub_field('content') ?>
            </div>
        <?php else : ?>
            <div class="content_with_image_content">
                <?php the_sub_field('content') ?>
            </div>

            <div class="content_with_image_image">
                <img src="<?php echo get_sub_field('image')['url'] ?>" alt="">
            </div>
        <?php endif; ?>
        <p></p>
    </div>
</section>