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
class OfferAddFormStep3 extends ContentEntityForm {
  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    /* @var $entity \Drupal\offer\Entity\Offer */
    $form = parent::buildForm($form, $form_state);
    $form['actions']['submit']['#value'] = t('Save and proceed');
    return $form;
  }
  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    // Redirect to offer overview after save.
    $form_state->setRedirect('entity.offer.collection');
    \Drupal::messenger()->addMessage('Your offer was created. Click the publish button to start earning!');

    $entity = $this->getEntity();
    $entity->save();

    $form_state->setRedirect('entity.offer.collection');
  }
}
