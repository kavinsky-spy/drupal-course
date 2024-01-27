<?php

namespace Drupal\offer\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\bid\Entity\Bid;
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

    $price = '';
    $form['#cache'] = ['max-age' => 0];

    switch ($offer->get('field_offer_type')->getString()) {
      case 'with_minimum':
        $price = $offer->get('field_price')->getString();
        break;
      case 'no_minimum':
        $price = '0';
        break;
    }

    $form['offer_id'] = [
      '#type' => 'hidden',
      '#value' => $offer->id(),
      '#access' => FALSE
    ];

    $OfferHasBid = $offer->getOfferHighestBid();
    if($OfferHasBid) {
      $price = $OfferHasBid + 1;
    }


    $form['price'] = [
      '#markup' => '<h2>' . $this->t('Start bidding at @price$', ['@price' => $price]) . '</h2>',
    ];

    $form['bid'] = [
      '#type' => 'number',
      // '#attributes' => [
      //   'type' => 'number',
      //   'min' => $price
      // ],
      '#title' => $this->t('Your bid'),
      '#description' => $this->t('Prices in $. ' .  $form_state->getValue('bid')),
      // '#required' => TRUE,
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

  // public function validateForm(array &$form, FormStateInterface $form_state) {
  //   parent::validateForm($form, $form_state);


  //   $minimum_price = 0;
  //   // Load the offer and make sure no higher bids were done
  //   // in the meantime!
  //   $offer_id = $form_state->getValue('offer_id');
  //   $offer = Offer::load($offer_id);
  //   $OfferHasBid = $offer->getOfferHighestBid();
  //   switch ($offer->get('field_offer_type')->getString()) {
  //     case 'with_minimum':
  //       $minimum_price = isset($OfferHasBid) ? $OfferHasBid : $offer->get('field_price')->getString();
  //       break;
  //     case 'no_minimum';
  //       $minimum_price = isset($OfferHasBid) ? $OfferHasBid : 0;
  //       break;
  //   }



  //   if ($minimum_price >= $form_state->getValue('bid')) {
  //     $form_state->setErrorByName('bid', t('Minimum bid needs to be @price', ['@price' => (@$minimum_price + 1) . '$']));;
  //   }


  //   // server-side validation
  //   if (!is_numeric($form_state->getValue('bid'))) {
  //     $form_state->setErrorByName('bid', t('Bid input needs to be numeric.'));
  //   }
  // }



  public function submitForm(array &$form, FormStateInterface $form_state) {
    $bid = Bid::create([
      'bid' => $form_state->getValue('bid'),
      'user_id' => ['target_id' => \Drupal::currentUser()->id()],
      'offer_id' => $form_state->getValue('offer_id'),
    ]);

    $violations = $bid->validate();
    $validation = $violations->count();

    if ($validation == 0) {
      $bid->save();
      \Drupal::messenger()->addMessage($this->t('Your bid was successfully submitted'));
    } else {
      \Drupal::messenger()->addWarning($violations[0]->getMessage());
    }


  }
}
