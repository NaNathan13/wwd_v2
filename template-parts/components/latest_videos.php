<section class="latest_video_section">
    <div class="latest_video_container">
        <h2>Latest <span class="red">Videos</span></h2>
        <div class="latest_videos_content_wrapper">
            <?php while (have_rows('home_latest_video_repeater')) : the_row(); ?>
                <div class="latest_video_element"><?php echo get_sub_field('video') ?></div>
            <?php endwhile; ?>
        </div>
    </div>
</section>