/**
 * @file
 * Fepper theme-specific Drupal Behaviors.
 */

(function ($) {
  'use strict';

  function mobileNavToggle($togglerParent) {
    var $toggler = $togglerParent.find('> h2 > a');

    if ($toggler.length) {
      $toggler.click(function (e) {
        e.preventDefault();

        $togglerParent.toggleClass('open');

        if (!$togglerParent.hasClass('open')) {
          $toggler.blur();
        }
      });
    }
  }

  Drupal.behaviors.openToggle = {
    attach: function (context) {
      var searchBlock = $('#block-search-form', context);
      var mainMenuBlock = $('#main-menu', context);

      if (searchBlock.length) {
        mobileNavToggle($('#block-search-form', context));
      }

      if (mainMenuBlock.length) {
        mobileNavToggle($('#main-menu', context));
      }
    }
  };
})(jQuery);
