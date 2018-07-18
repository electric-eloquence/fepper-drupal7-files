<?php

/**
 * @file
 * Fepper theme's implementation to display a search form.
 */
?>
<div id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>" <?php print $attributes; ?>>
  <?php print render($title_prefix); ?>
  <h2 <?php print $title_attributes; ?>><a href="#"><?php print $block->subject ? $block->subject : 'Search form'; ?></a></h2>
  <?php print render($title_suffix); ?>

  <div class="content" <?php print $content_attributes; ?>>
    <?php print $content ?>
  </div>
</div>
