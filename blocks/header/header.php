<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <?php block('head') ?>
  <body <?php body_class(); ?>>

    <?php /* this is set in blocks/head */ ?>
    <?php if(!empty($google_tag_manager_id)): ?>
      <!-- Google Tag Manager (noscript) -->
      <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo $google_tag_manager_id; ?>"
      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
      <!-- End Google Tag Manager (noscript) -->
    <?php endif; ?>

    <?php wp_body_open(); ?>

    <header class="main-header">
      <a class="skip-to-content" href="#content" onclick="document.querySelector('#content').focus()">skip to main content</a>


      <div class="main-header--search wrapper flex justify-end">
        <?php block('search-form'); ?>
      </div>

      <div class="main-header--wrapper wrapper">

        <a class="main-header--site-logo" href="<?php echo home_url(); ?>" title="<?php echo bloginfo('name'); ?> home">
          <?= get_field('site_logo', 'option') ?>
        </a>

        <?php block('navigation') ?>

        <button class="mobile-only mobile-menu-button"><span></span></button>        
      </div>

    </header>
    <main id="content" tabindex="-1" style="outline:none">