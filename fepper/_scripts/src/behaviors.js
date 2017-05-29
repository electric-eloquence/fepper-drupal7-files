/**
 * @file
 * Fepper theme-specific Drupal Behaviors.
 */

(function ($) {
  'use strict';

  function toggleOpen(parentSelector, context) {
    $(parentSelector, context)
      .find('h2')
      .click(function () {
        $(this).parents(parentSelector).toggleClass('open');
      }
    );
  }

  Drupal.behaviors.openToggle = {
    attach: function (context) {
      toggleOpen('#navigation');
      toggleOpen('#block-search-form');
    }
  };
})(jQuery);
