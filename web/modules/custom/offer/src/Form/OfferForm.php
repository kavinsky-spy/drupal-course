<?php

/**
 * @file
 * Contains Drupal\offer\Form\OfferForm.
 */

namespace Drupal\offer\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for the offer entity edit forms.
 *
 * @ingroup content_entity_example
 */
class OfferForm extends ContentEntityForm {
  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    /* @var $entity \Drupal\offer\Entity\Offer */
    $form = parent::buildForm($form, $form_state);
    return $form;
  }
  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    // Redirect to offer list after save.
    $form_state->setRedirect('entity.offer.collection');
    $entity = $this->getEntity();
    $entity->save();
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
