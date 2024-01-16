<?php

namespace Drupal\offer\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\offer\Entity\Offer;

class OfferBiddingForm extends FormBase {

  /**
   * @return string
   * The unique string identifying the form.
   */
  public function getFormId() {
    return 'offer_bid_form';
  }
  /**
   * Form constructor.
   *
   * @param array $form
   * An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   * The current state of the form.
   * @param \Drupal\offer\Entity\Offer $offer
   * The offer entity we're viewing
   *
   * @return array
   * The form structure.
   */
  public function buildForm(array $form, FormStateInterface $form_state, $offer = NULL) {

    $price = null;
    switch ($offer->get('field_offer_type')->getString()) {
      case 'with_minimum':
        $price = $offer->get('field_price')->getString();
        break;
      case 'no_minimum';
        $price = '0';
        break;
    }
    $form['price'] = [
      '#markup' => '<h2>' . $this->t('Start bidding at @price$', ['@price' =>
      $price]) . '</h2>',
    ];

    $form['bid'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Your bid'),
      '#description' => $this->t('Prices in $.'),
      '#required' => TRUE,
    ];
    // Group submit handlers in an actions element with a key of "actions" .
      $form['actions'] = [
        '#type' => 'actions',
      ];
    // Add a submit button that handles the submission of the form.
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];
    return $form;
  }

  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
    // server-side validation
    if (!is_numeric($form_state->getValue('bid'))) {
      $form_state->setErrorByName('bid', t('Bid input needs to be numeric.'));
    }
  }



  public function submitForm(array &$form, FormStateInterface $form_state) {

  }
}
