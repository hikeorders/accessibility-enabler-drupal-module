<?php

/**
 * @file
 * Contains Drupal\a11yenabler\Form\A11yEnablerSettingsForm.
 */

namespace Drupal\a11yenabler\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Link;
use Drupal\Core\Render\Element;

/**
 * Returns responses for module routes.
 */
class A11yEnablerSettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'a11yenabler_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('a11yenabler.settings')
        ->set('a11yenabler_orgId', $form_state->getValue('a11yenabler_orgId'))
        ->save();

    if (method_exists($this, '_submitForm')) {
      $this->_submitForm($form, $form_state);
    }

    parent::submitForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['a11yenabler.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, \Drupal\Core\Form\FormStateInterface $form_state) {
    $form = [];

    $form['a11yenabler_heading'] = array(
      '#type' => 'item',
      '#markup' => $this->t('<img src="@logo" style="float: right;width: 250px;" alt="Accessibility  Enabler">'
        . '<a href="@url">Accessibility  Enabler</a> helps to increase sales with disability friendly site.<br/><br/>',
        array(
          '@url' => 'https://hikeorders.com/accessibility/home/',
          '@logo' => 'https://app.a11y.hikeorders.com/bundles/orocrm/images/LogoWIthText.png'
        )
      ),
    );



    $form['a11yenabler_orgId'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Enter Accessibility Enabler Org ID'),
      '#attributes' => array(
        'placeholder' => $this->t('e.g. xsrr5ew34567f'),
      ),
      '#default_value' => \Drupal::config('a11yenabler.settings')->get('a11yenabler_orgId'),
      '#description' => $this->t('<br/>'
        . 'Your OrgID is available during on-boarding process in your Accessibility Enabler account.<br/><br/>'
        . ''),
    );

    $form['a11yenabler_help'] = array(
      '#type' => 'item',
      '#markup' => $this->t(
          '<em>Note: if you don\'t get accessibility icons on your site, try clearing Drupal cache.</em><br/><br/>'
        . '<strong>Support:</strong> <a href="mailto:team@hikeorders.com">team@hikeorders.com</a><br />'
        . '<strong>Website: </strong><a href="https://hikeorders.com/accessibility/home/" target="_blank">https://hikeorders.com/accessibility/home/</a>'),
    );

    return parent::buildForm($form, $form_state);
  }

}
