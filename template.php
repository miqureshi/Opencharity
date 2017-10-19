<?php

function opencharity_preprocess_html(&$variables) {
  drupal_add_css('https://fonts.googleapis.com/css?family=Roboto:400,500,700', array('type' => 'external'));
}

/**
 * Implements hook_css_alter().
 */
function opencharity_css_alter(&$css) {
  if (isset($css['core/misc/style.css'])) {
    $css['core/misc/style.css']['data'] = drupal_get_path('theme', 'opencharity') . '/common.css';
  }
}

function opencharity_preprocess_html_tag(&$variables) {
  // Loop over element children, render them, and add them to the #value string.
  foreach (element_children($variables['element']) as $key) {
    if ($variables['element']['#value'] === NULL) {
      // Set this to string to avoid E_NOTICE error when concatenating to NULL.
      $variables['element']['#value'] = '';
    }
    // Concatenate the rendered child onto the element #value.
    $variables['element']['#value'] .= drupal_render($variables['element'][$key]);
  }
  $viewport = array(
   '#tag' => 'meta',
   '#attributes' => array(
     'name' => 'viewport',
     'content' => 'width=device-width, initial-scale=1, maximum-scale=1',
   ),
  );
  drupal_add_html_head($viewport, 'viewport');
}

function opencharity_preprocess_page(&$variables) {
    // Get the entire main menu tree
    $main_menu_tree = menu_tree_all_data('main-menu');
    // Add the rendered output to the $main_menu_expanded variable

   $variables['main_menu_expanded'] = menu_tree_output($main_menu_tree);

}
