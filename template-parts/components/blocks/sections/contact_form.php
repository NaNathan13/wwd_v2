<section class="contact_form_section">
    <div class="contact_form_container">
        <h2>Contact Form Block</h2>
        <?php if (get_sub_field('section_headline')) : ?>
            <h2><?php echo get_sub_field('section_headline') ?></h2>
        <?php endif; ?>

        <?php if (get_sub_field('section_subheadline')) : ?>
            <p><?php echo get_sub_field('section_subheadline') ?></p>
        <?php endif; ?>

    </div>
</section>