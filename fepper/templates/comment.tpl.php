<div class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php if ($new): ?>
    <span class="new" style="display: none;"><?php print $new; ?></span>
  <?php endif; ?>

  <?php print render($title_prefix); ?>
  <h3 style="display: none;"><?php print $title; ?></h3>
  <?php print render($title_suffix); ?>

  <div class="submitted">
    <?php print $picture; ?>
    <?php //print $permalink; ?>
    <?php print $submitted; ?>
  </div>

  <div class="content"<?php print $content_attributes; ?>>
    <?php
  // We hide the comments and links now so that we can render them later.
  hide($content['links']);
  print render($content);
?>
    <?php if ($signature): ?>
    <div class="user-signature clearfix">
      <?php print $signature; ?>
    </div>
    <?php endif; ?>
  </div>

  <?php //print render($content['links']); ?>

</div>
