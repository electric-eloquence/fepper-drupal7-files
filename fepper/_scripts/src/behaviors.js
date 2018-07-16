/**
 * @file
 * Fepper theme-specific Drupal Behaviors.
 */

(function ($) {
  'use strict';

  function mobileNavToggle($togglerParent) {
    var $toggler = $togglerParent.find('> h2 > a');

    $toggler.click(function (e) {
      e.preventDefault();

      $togglerParent.toggleClass('open');

      if (!$togglerParent.hasClass('open')) {
        $toggler.blur();
      }
    });
  }

  Drupal.behaviors.openToggle = {
    attach: function (context) {
      mobileNavToggle($('#main-menu', context));
      mobileNavToggle($('#block-search-form', context));
    }
  };
})(jQuery);
