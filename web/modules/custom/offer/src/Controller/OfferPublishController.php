<?php

namespace Drupal\offer\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Entity\RevisionLogInterface;
use Drupal\Core\Url;
use Drupal\offer\Entity\Offer;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Drupal\Core\Access\AccessResult;

/**
 *
 * Class OfferPublishController.
 */
class OfferPublishController extends ControllerBase {
  public function Render(Offer $offer){
    //set moderation status to published.
    $new_state = 'published';

    $offer->set('moderation_state', $new_state);
    if($offer instanceof RevisionLogInterface) {
      $offer->setRevisionLogMessage('Changed moderation state to published');
      $offer->setRevisionUserId($this->currentUser()->id());

    }
    $offer->save();

    $publishedOffer = Url::fromRoute('entity.offer.canonical', ['offer' => $offer->id()])->toString();

    \Drupal::messenger()->addMessage($offer->label() . ' is published.');

    return new RedirectResponse($publishedOffer);

  }

  public function Access(Offer $offer) {
    // securing no one is trying to publish offers
    // that aren't theirs
    $access = AccessResult::allowedIf($offer->access('view'));

    //make sure state is draft
    if($offer->get('moderation_state')->getString() != 'draft') {
      $access = AccessResult::forbidden();
    }

    return $access;
  }
}
