<?php

/**
 * @file
 * Fepper theme's implementation to display a search form. The difference from
 * the default is the a tag around the subject.
 */
?>
<div id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>" <?php print $attributes; ?>>

  <?php print render($title_prefix); ?>
  <?php if ($block->subject): ?>
    <h2 <?php print $title_attributes; ?>><a href="#"><?php print $block->subject ?></a></h2>
  <?php endif;?>
  <?php print render($title_suffix); ?>

  <div class="content" <?php print $content_attributes; ?>>
    <?php print $content ?>
  </div>
</div>
