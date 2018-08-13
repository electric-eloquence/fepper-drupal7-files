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

  Drupal.behaviors.toggleMobileNav = {
    attach: function (context) {
      var $searchBlock = $('#block-search-form', context);
      var $mainMenuBlock = $('#main-menu', context);

      if ($searchBlock.length) {
        mobileNavToggle($searchBlock);

        var $searchToggler = $searchBlock.find('> h2 > a');

        if ($searchToggler.length) {
          $searchToggler.click(function () {
            var searchBlockRect = $searchBlock[0].getBoundingClientRect();

            if ($searchBlock.hasClass('open')) {
              $searchBlock.children('.content').css('top', (searchBlockRect.height + 1) + 'px');
            }
          });
        }
      }

      if ($mainMenuBlock.length) {
        mobileNavToggle($mainMenuBlock);

        var $mainMenuToggler = $mainMenuBlock.find('> h2 > a');

        if ($mainMenuToggler.length) {
          $mainMenuToggler.click(function () {
            var mainMenuBlockRect = $mainMenuBlock[0].getBoundingClientRect();

            if ($mainMenuBlock.hasClass('open')) {
              $mainMenuBlock.children('ul').css('top', (mainMenuBlockRect.height + mainMenuBlockRect.top) + 'px');
            }
          });
        }
      }
    }
  };

  Drupal.behaviors.resetSearchBlock = {
    attach: function (context) {
      $(window).resize(function () {
        var $searchBlock = $('#block-search-form', context);

        if ($searchBlock.length && $searchBlock.hasClass('open')) {
          $searchBlock.removeClass('open');
          $searchBlock.children('.content').css('top', '0');
        }
      });
    }
  };
})(jQuery);
