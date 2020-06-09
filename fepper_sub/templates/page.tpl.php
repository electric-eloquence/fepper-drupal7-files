<?php

/**
 * @file
 * Fepper theme's implementation to display a single Drupal page.
 *
 * Additional variables:
 * - $system_site_name: Provides site name even with $site_name switched off.
 * - $main_menu_block_enabled: (boolean) Is main menu enabled as a block?
 * - $main_menu_expanded: The main menu and its sub-trees fully expanded.
 *
 * @see system/page.tpl.php
 */
?>
<div class="layout-container">
  <header id="header" class="header cf">

    <div id="block-fepper-branding">
      <?php if ($logo): ?>
        <?php
          // Wrap in h1 on front page when the site name is not configured to be
          // rendered.
        ?>
        <?php if ($is_front): ?>
          <?php if (!$site_name): ?>
            <h1>
          <?php endif; ?>
        <?php endif; ?>
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
          <img src="<?php print $logo; ?>" alt="<?php print $system_site_name; ?>" />
        </a>
        <?php if ($is_front): ?>
          <?php if (!$site_name): ?>
            </h1>
          <?php endif; ?>
        <?php endif; ?>
      <?php endif; ?>
      <?php if ($site_name): ?>
        <?php
          // Wrap in h1 on front page or when the content title is empty.
        ?>
        <?php if ($is_front || !$title): ?>
          <h1 id="site-name">
        <?php else: ?>
          <div id="site-name">
        <?php endif; ?>
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home">
          <?php print $site_name; ?>
        </a>
        <?php if ($is_front || !$title): ?>
          </h1>
        <?php else: ?>
          </div>
        <?php endif; ?>
      <?php endif; ?>
      <?php if ($site_slogan): ?>
        <div id="site-slogan"><?php print $site_slogan; ?></div>
      <?php endif; ?>
    </div> <!-- /#block-fepper-branding -->

    <?php print render($page['header']); ?>

    <?php
      // On a default install, the main-menu expanded will appear in the header.
      // Do not render this menu if the main-menu block is administratively
      // enabled in a region at admin/structure/block.
    ?>
    <?php if (!$main_menu_block_enabled): ?>
      <nav id="main-menu" role="navigation" aria-labelledby="main-menu-menu">
        <h2 id="main-menu-menu"><a href="#" class="hidden-link"></a>
        <span class="visually-hidden">Main menu</span></h2>
        <?php print render($main_menu_expanded); ?>
      </nav> <!-- /#navigation -->
    <?php endif; ?>


  </header> <!-- /.header -->

  <?php
    // To get the breadcrumbs to show, add a block to the Breadcrumb region at
    // admin/structure/block. This could be a custom block consisting of just
    // <span></span> if you just want breadcrumbs and nothing else.
  ?>
  <?php if ($page['breadcrumb']): ?>
    <?php if ($breadcrumb): ?>
      <nav id="breadcrumb" role="navigation"><?php print $breadcrumb; ?></nav>
    <?php endif; ?>
    <?php print render($page['breadcrumb']); ?>
  <?php endif; ?>

  <?php if ($messages): ?>
    <div class="messages-container">
      <?php print $messages; ?>
    </div>
  <?php endif; ?>

  <main id="main" role="main">
    <a id="main-content" tabindex="-1"></a>

    <div class="layout-content">
      <?php if (!empty($page['highlighted'])): ?>
        <div id="highlighted"><?php print render($page['highlighted']); ?></div>
      <?php endif; ?>

      <?php if (!$is_front): ?>
        <?php print render($title_prefix); ?>
        <?php if ($title): ?>
          <h1 class="title" id="page-title"><?php print $title; ?></h1>
        <?php endif; ?>
        <?php print render($title_suffix); ?>
      <?php endif; ?>

      <?php if ($tabs): ?>
        <div class="tabs"><?php print render($tabs); ?></div>
      <?php endif; ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>
      <?php print $feed_icons; ?>
    </div> <!-- /.layout-content -->

    <?php if ($page['sidebar_first']): ?>
      <div id="sidebar-first" class="column sidebar">
        <?php print render($page['sidebar_first']); ?>
      </div> <!-- /#sidebar-first -->
    <?php endif; ?>

    <?php if ($page['sidebar_second']): ?>
      <div id="sidebar-second" class="column sidebar">
        <?php print render($page['sidebar_second']); ?>
      </div> <!-- /#sidebar-second -->
    <?php endif; ?>

  </main> <!-- /#main -->

  <footer id="footer" role="contentinfo">
    <?php print render($page['footer']); ?>
  </footer> <!-- /#footer -->

</div> <!-- /.layout-container -->
