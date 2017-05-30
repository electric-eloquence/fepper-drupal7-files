<?php

/**
 * @file
 * Functions to support theming in the Fepper theme.
 */

/*
// Parse variables.styl for breakpoints. Add them to the global $config array.
// Do this in the global scope so any and all functions can access these
// breakpoint configurations, even module functions.
// Out of the box, they will be:
// $config['breakpoints']['bp_lg_max'] = -1;
// $config['breakpoints']['bp_md_max'] = 1024;
// $config['breakpoints']['bp_sm_max'] = 767;
// $config['breakpoints']['bp_xs_max'] = 480;
// $config['breakpoints']['bp_xx_max'] = 320;
// $config['breakpoints']['bp_xx_min'] = 0;
 */
$bp_ini = drupal_get_path('theme', 'fepper') . '/_scripts/src/variables.styl';
if (file_exists($bp_ini)) {
  $GLOBALS['config']['breakpoints'] = parse_ini_file($bp_ini);
}

/**
 * Implements hook_form_FORM_ID_alter().
 */
function fepper_form_comment_form_alter(&$form, &$form_state, $form_id) {
  if (!empty($form['subject'])) {
    unset($form['subject']);
  }
}

/**
 * Implements hook_form_FORM_ID_alter().
 */
function fepper_form_search_block_form_alter(&$form, &$form_state, $form_id) {
  $form['search_block_form']['#attributes']['placeholder'] = t('Search');
  $form['search_block_form']['#attributes']['size'] = '';
}

/**
 * Implements template_preprocess_html().
 */
function fepper_preprocess_html(&$variables) {
  // Returns string containing RDF namespace declarations to use in HTML output.
  $html_rdf_namespaces = array();

  // Serializes the RDF namespaces in XML namespace syntax.
  if (function_exists('rdf_get_namespaces')) {
    foreach (rdf_get_namespaces() as $prefix => $uri) {
      $html_rdf_namespaces[] = $prefix . ': ' . $uri;
    }
  }

  $variables['rdf_namespaces'] = count($html_rdf_namespaces) ? "\n  " . implode("\n  ", $html_rdf_namespaces) : '';
}
