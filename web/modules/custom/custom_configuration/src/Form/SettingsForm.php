<?php



namespace Drupal\custom_configuration\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class SettingsForm extends FormBase {

    /**
     * {@inheritdoc}
     */
    public function getFormId() {
        return 'custom_configuration_settings';
    }

    protected function getEditableConfigNames() {
        return [
            'custom_configuration.settings',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state) {
        // Add form elements here
        $form['sociallinks'] = [
            '#type' => 'details',
            '#title' => $this->t('Social Links'),
            '#open' => TRUE,
        ];
        $form['sociallinks']['facebook'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Facebook'),
            '#default_value' => $config->get('custom_configuration.settings')->get('facebook'),
        ];
        $form['sociallinks']['twitter'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Twitter'),
            '#default_value' => $config->get('custom_configuration.settings')->get('twitter'),
        ];
    
    

        return parent::buildForm($form, $form_state);
    }

    public function validateForm(array &$form, FormStateInterface $form_state) {
        // Validate submitted form data here
        // $email = $form_state->getValue('email');
        // if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //     $form_state->setErrorByName('email', $this->t('The email address %mail is not valid.', ['%mail' => $email]));
        // }
        // parent::validateForm($form, $form_state);
    }
    

    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state) {
        // Handle form submission here
        $name = $form_state->getValue('name');
        $email = $form_state->getValue('email');

        // Perform necessary actions with the submitted data

        drupal_set_message($this->t('Form submitted successfully.'));
    }

}
