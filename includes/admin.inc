<?php

/**
 * @file
 *   Drupal admin settings form for Crazy Egg module.
 */

/**
 * Crazy Egg module admin settings form. Used to toggle
 * Crazy Egg status and to set account ID.
 */
function a11yenabler_admin_settings_form() {
  $form = array();



  $form['a11yenabler_org_id'] = array(
    '#type' => 'textfield',
    '#title' => t('Enter Accessibility Enabler Org ID'),
    '#attributes' => array(
      'placeholder' => t('e.g. xsrr5ew34567f'),
    ),
    '#default_value' => variable_get('a11yenabler_org_id', ''),
    '#description' => t('Your OrgID is available during on-boarding process in your Accessibility Enabler account.<br/><br/>'),
  );


  $form['a11yenabler_help'] = array(
    '#type' => 'item',
    '#markup' => t(
        '<em>Note: if you don\'t get accessibility icons on your site, try clearing Drupal cache.</em><br/><br/>'
        . '<strong>Support:</strong> <a href="mailto:team@hikeorders.com">team@hikeorders.com</a><br />'
        . '<strong>Website: </strong><a href="https://hikeorders.com/accessibility/home/" target="_blank">https://hikeorders.com/accessibility/home/</a>'
    ),
  );

  return system_settings_form($form);
}