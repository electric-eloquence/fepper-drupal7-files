<?php

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
  // Returns a string containing RDF namespace declarations for use in HTML output.
  $html_rdf_namespaces = array();

  // Serializes the RDF namespaces in XML namespace syntax.
  if (function_exists('rdf_get_namespaces')) {
    foreach (rdf_get_namespaces() as $prefix => $uri) {
      $html_rdf_namespaces[] = $prefix . ': ' . $uri;
    }
  }

  $variables['rdf_namespaces'] = count($html_rdf_namespaces) ? "\n  " . implode("\n  ", $html_rdf_namespaces) : '';
}
