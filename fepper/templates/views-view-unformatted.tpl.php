<?php

/**
 * @file
 * Fepper theme's implementation to display view rows unformatted.
 */
?>
<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>

<?php foreach ($rows as $id => $row): ?>
  <div class="<?php $classes_array[$id]; ?>"><?php print $row; ?></div>
<?php endforeach; ?>
