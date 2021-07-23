<section class="contact_form_section">
    <div class="contact_form_container">
        <?php get_template_part('template-parts/section_headlines'); ?>

        <div class="contact_form_wrapper">
            <form action="<?php echo get_template_directory_uri() . '/php_handlers/contact_form_handler.php' ?>" method="POST">
                <p>Name</p>
                <input type="text" name="name">

                <p>Email</p>
                <input type="text" name="email">

                <p>Phone</p>
                <input type="text" name="phone">

                <p>Message</p><textarea name="message" rows="6" cols="25"></textarea><br />
                <input type="submit" value="Send"><input type="reset" value="Clear">
            </form>
        </div>
    </div>
</section>