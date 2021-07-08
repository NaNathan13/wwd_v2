<section class="shop_rbg_section">
    <div class="shop_rbg_container">
        <h2>SHOP OUR <span class="red">MERCH</span></h2>
        <div class="shop_rbg_content_container">
            <?php if (have_rows('shop_rbg', 'option')) :
                while (have_rows('shop_rbg', 'option')) : the_row(); ?>
                    <div class="shop_rbg_merch_card">
                        <a href="<?php echo get_sub_field('link', 'option') ?>"><img src="<?php echo get_sub_field('image', 'option')['url'] ?>" alt="" loading="lazy"></a>
                    </div>
            <?php endwhile;
            endif; ?>
        </div>
        <a class="cta_btn" href="">SHOP TODAY</a>
    </div>
</section>