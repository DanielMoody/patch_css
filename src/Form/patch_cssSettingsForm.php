<?php

namespace Drupal\patch_css\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class patch_cssSettingsForm extends ConfigFormBase {

  protected function getEditableConfigNames(): array {
    return ['patch_css.settings'];
  }

  public function getFormId(): string {
    return 'patch_css_settings_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state): array {
    $config = $this->config('patch_css.settings');

    $form['styles'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Styles'),
      '#default_value' => $config->get('styles') ?? '',
    ];

    return parent::buildForm($form, $form_state);
  }

  public function submitForm(array &$form, FormStateInterface $form_state): void {
    $this->config('patch_css.settings')
      ->set('styles', $form_state->getValue('styles'))
      ->save();

    parent::submitForm($form, $form_state);
  }

}
