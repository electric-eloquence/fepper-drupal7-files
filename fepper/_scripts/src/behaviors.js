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

  Drupal.behaviors.closeExpandedMenuOnTablet = {
    attach: function (context) {
      // On wider mobile viewports (phablets and tablets), touching ".expanded" links will expand nested menus.
      // The following listener removes the focus from those links, thereby closing their expanded menus.
      $('body', context).click(function () {});
    }
  };

  Drupal.behaviors.toggleMobileNav = {
    attach: function (context) {
      var $body = $('body', context);
      var $header = $('.header', context);
      var $searchBlock = $('.region-header #block-search-form', context);
      var $mainMenuBlock = $('#main-menu', context);

      if ($searchBlock.length) {
        mobileNavToggle($searchBlock);

        var $searchToggler = $searchBlock.find('> h2 > a');

        if ($searchToggler.length) {
          $searchToggler.click(function () {
            if ($searchBlock.hasClass('open')) {
              var cssTop = 'calc(' + $body.css('padding-top') + ' + ' + $header.outerHeight() + 'px)';

              $searchBlock.children('.content').css('top', cssTop);
            }
            else {
              $searchBlock.children('.content').css('top', '');
            }
          });
        }
      }

      if ($mainMenuBlock.length) {
        mobileNavToggle($mainMenuBlock);

        var $mainMenuToggler = $mainMenuBlock.find('> h2 > a');

        if ($mainMenuToggler.length) {
          $mainMenuToggler.click(function () {
            if ($mainMenuBlock.hasClass('open')) {
              var cssTop = 'calc(' + $body.css('padding-top') + ' + ' + $header.outerHeight() + 'px)';

              $mainMenuBlock.children('ul').css('top', cssTop);
            }
            else {
              $mainMenuBlock.children('ul').css('top', '');
            }
          });
        }
      }
    }
  };

  Drupal.behaviors.resetMobileNavBlocks = {
    attach: function (context) {
      $(window).resize(function () {
        var $searchBlock = $('.region-header #block-search-form', context);
        var $mainMenuBlock = $('#main-menu', context);

        if ($searchBlock.length && $searchBlock.hasClass('open')) {
          $searchBlock.removeClass('open');
          $searchBlock.children('.content').css('top', '');
        }

        if ($mainMenuBlock.length) {
          $mainMenuBlock.removeClass('open');
          $mainMenuBlock.children('ul').css('top', '');
        }
      });
    }
  };
})(jQuery);
