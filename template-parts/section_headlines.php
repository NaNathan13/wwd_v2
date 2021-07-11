<?php if (get_sub_field('section_headline')) : ?>
    <h2 class="section_headline align-<?php echo get_sub_field('headline_alignment') ?>"><?php echo get_sub_field('section_headline') ?></h2>
<?php endif; ?>

<?php if (get_sub_field('section_subheadline')) : ?>
    <h5 class="section_subheadline align-<?php echo get_sub_field('headline_alignment') ?>"><?php echo get_sub_field('section_subheadline') ?></h5>
<?php endif; ?>