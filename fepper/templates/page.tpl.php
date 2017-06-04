<?php

/**
 * @file
 * Fepper theme's implementation to display a single Drupal page.
 */
?>
<div class="layout-container">
  <header class="header cf">

    <div id="block-fepper-branding">
      <?php if ($logo): ?>
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
          <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
        </a>
      <?php endif; ?>

      <?php
        // To get the $site_name / $site_slogan to show, add a block to the
        // Branding region in admin/structure/block.
      ?>
      <?php if ($page['branding']): ?>
        <?php if ($site_name || $site_slogan): ?>
          <div id="name-and-slogan">
            <?php if ($site_name): ?>
              <?php if ($title): ?>
                <div id="site-name"><strong>
                  <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home">
                    <span><?php print $site_name; ?></span>
                  </a>
                </strong></div>
              <?php else: /* Use h1 when the content title is empty */ ?>
                <h1 id="site-name">
                  <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home">
                    <span><?php print $site_name; ?></span>
                  </a>
                </h1>
              <?php endif; ?>
            <?php endif; ?>

            <?php if ($site_slogan): ?>
              <div id="site-slogan"><?php print $site_slogan; ?></div>
            <?php endif; ?>
          </div> <!-- /#name-and-slogan -->
        <?php endif; ?>

        <?php print render($page['branding']); ?>
      <?php endif; ?>
    </div> <!-- /#block-fepper-branding -->

    <?php print render($page['header']); ?>

    <?php if ($main_menu_expanded || $secondary_menu): ?>
      <nav id="navigation" role="navigation">
        <div id="main-menu">
          <h2 class="icon-menu">Main menu</h2>
          <?php print render($main_menu_expanded); ?>
        </div>
        <?php print theme(
          'links__system_secondary_menu',
          array(
            'links' => $secondary_menu,
            'attributes' => array(
              'id' => 'secondary-menu',
            ),
            'heading' => array(
              'text' => t('Secondary menu'),
              'level' => 'h2',
              'class' => 'element-invisible',
            ),
          )
        ); ?>
      </nav> <!-- /#navigation -->
    <?php endif; ?>

  </header> <!-- /.header -->

  <?php
    // To get the breadcrumbs to show, add a block to the Breadcrumb region in
    // admin/structure/block.
  ?>
  <?php if ($page['breadcrumb']): ?>
    <?php if ($breadcrumb): ?>
      <nav id="breadcrumb" role="navigation"><?php print $breadcrumb; ?></nav>
    <?php endif; ?>

    <?php print render($page['breadcrumb']); ?>
  <?php endif; ?>

  <div class="messages-container">
    <?php print $messages; ?>
  </div>
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
    <div id="block-fepperfooter">
      <?php print render($page['footer']); ?>
    </div> <!-- /#block-fepperfooter -->
  </footer> <!-- /#footer -->

</div> <!-- /.layout-container -->
