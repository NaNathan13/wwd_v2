<?php $fiftyFiftyHero = get_sub_field('fifty_fifty_hero'); ?>

<section class="fifty_fifty_hero_section">
    <div class="fifty_fifty_hero_container">
        <div class="fifty_fifty_hero_headline">
            <?php if ($fiftyFiftyHero['Page Headline']) : ?>
                <h1><?php echo $fiftyFiftyHero['Page Headline'] ?></h1>
            <?php endif; ?>
        </div>
        <?php if ($fiftyFiftyHero['Page Headline']) : ?>
            <div class="fifty_fifty_hero_image">
                <img src="<?php echo $fiftyFiftyHero['Page Headline'] ?>" alt="">
            </div>
        <?php endif; ?>
    </div>
</section>