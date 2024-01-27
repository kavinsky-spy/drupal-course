<?php
/**
 * @file
 * Contains \Drupal\offer\Entity\Offer.
 */

namespace Drupal\offer\Entity;

use Drupal\Core\Entity\EditorialContentEntityBase;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\bid\Entity\Bid;

/**
 * Defines the offer entity.
 *
 * @ingroup offer
 *
 * @ContentEntityType(
 *   id = "offer",
 *   label = @Translation("Offer"),
 *   base_table = "offer",
 *   data_table = "offer_field_data",
 *   revision_table = "offer_revision",
 *   revision_data_table = "offer_field_revision",
 *   entity_keys = {
 *     "id" = "id",
 *     "uuid" = "uuid",
 *     "label" = "title",
 *     "revision" = "vid",
 *     "status" = "status",
 *     "published" = "status",
 *     "uid" = "uid",
 *     "owner" = "uid",
 *   },
 *   revision_metadata_keys = {
 *     "revision_user" = "revision_uid",
 *     "revision_created" = "revision_timestamp",
 *     "revision_log_message" = "revision_log"
 *   },
 *   handlers = {
 *    "access" = "Drupal\offer\OfferAccessControlHandler",
 *    "views_data" = "Drupal\offer\OfferViewsData",
 *    "form" = {
 *     "add" = "Drupal\offer\Form\OfferForm",
 *     "step_1" = "Drupal\offer\Form\OfferAddFormStep1",
 *     "step_2" = "Drupal\offer\Form\OfferAddFormStep2",
 *     "step_3" = "Drupal\offer\Form\OfferAddFormStep3",
 *     "edit" = "Drupal\offer\Form\OfferForm",
 *     "delete" = "Drupal\offer\Form\OfferDeleteForm",
 *     },
 *    },
 *   links = {
 *    "canonical" = "/offer/{offer}",
 *    "delete-form" = "/offer/{offer}/delete",
 *    "edit-form" = "/offer/{offer}/edit",
 *    "create" = "/offer/create",
 *    },
 *   field_ui_base_route = "entity.offer.settings"
 * )
 */

class Offer extends EditorialContentEntityBase {

  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields = parent::baseFieldDefinitions($entity_type); // provides id and uuid fields

    $fields['user_id'] = BaseFieldDefinition::create('entity_reference')
      ->setLabel(t('User'))
      ->setDescription(t('The user that created the offer.'))
      ->setSetting('target_type', 'user')
      ->setSetting('handler', 'default')
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'author',
        'weight' => 0,
      ])
      ->setDisplayOptions('form', [
        'type' => 'entity_reference_autocomplete',
        'weight' => 5,
        'settings' => [
          'match_operator' => 'CONTAINS',
          'size' => '60',
          'autocomplete_type' => 'tags',
          'placeholder' => '',
        ],
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['title'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Title'))
      ->setDescription(t('The title of the offer'))
      ->setRequired(TRUE)
      ->setSettings([
        'max_length' => 150,
        'text_processing' => 0,
      ])
      ->setDefaultValue('')
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'string',
        'weight' => -4,
      ])
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => -4,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);


    $fields['status'] = BaseFieldDefinition::create('boolean')
      ->setLabel(t('Publishing status'))
      ->setDescription(t('A boolean indicating whether the Offer entity is published.'))
      ->setDefaultValue(TRUE);

    $fields['created'] = BaseFieldDefinition::create('created')
      ->setLabel(t('Created'))
      ->setDescription(t('The time that the entity was created.'));

    $fields['changed'] = BaseFieldDefinition::create('changed')
      ->setLabel(t('Changed'))
      ->setDescription(t('The time that the entity was last edited.'));

    return $fields;
  }


  /**
   * {@inheritdoc}
   *
   * Makes the current user the owner of the offer.
   */
  public static function preCreate(EntityStorageInterface $storage_controller, array &$values) {
    parent::preCreate($storage_controller, $values);
    $values += [
      'user_id' => \Drupal::currentUser()->id(),
    ];
  }


  /**
   * {@inheritdoc}
   */
  public function getOwner() {
    return $this->get('user_id')->entity;
  }

  /**
   * {@inheritdoc}
   */
  public function getOwnerId() {
    return $this->get('user_id')->target_id;
  }

  /**
   *
   * Return a promotext
   */
  public function getPromoText() {
    return 'Be the first!';
  }

  /**
   *
   * Return a price field
   * @return string the price
   */
  public function getPriceAmount() {
    $price = '';
    $OfferHasBid = $this->getOfferHighestBid();
    switch($this->get('field_offer_type')->getString()) {
      case 'with_minimum':
        $price = $this->get('field_price')->getString() . '$';


      case 'no_minimum':
        $price = 'Start bidding at 0$';
    }
    if ($OfferHasBid) {
      $price = 'Highest bid currently ' . $OfferHasBid . '$';

    } else {
      $price = 'No bids yet. Grab your chance!';
    }

    return $price;
  }


/**
 * Return highest bid on an offer
 *
 * @return integer|null
 * the bid price
 */
  public function getOfferHighestBid() {
    $bids = [];
    $id = $this->id();
    $query = \Drupal::entityQuery('bid')
    ->condition('offer_id', $id)
    ->sort('bid', 'ASC')
    ->range(NULL, 1)
    ->accessCheck(FALSE);

    $bidIds = $query->execute();

    $price = null;

    foreach($bidIds as $id) {
      $bid = Bid::load($id);
      $price = $bid->get('bid')->getString();
    }

    return $price;

  }

/**
 *  Returns all bids of an offer
 *  @return array $bids
 *  Array of bid entities
 */
public function getOfferBids() {
  $bids = [];
  $id = $this->id();

  $query = \Drupal::entityQuery('bid')
    ->condition('offer_id', $id)
    ->sort('bid', 'DESC')
    ->accessCheck(FALSE);

  $bidIds = $query->execute();
  foreach($bidIds as $id) {
    $bid = Bid::load($id);
    $bids[] = $bid;
  }
  return $bids;
}

/**
 *  Returns the bid amount
 */
public function getBidAmount() {
  $bids = $this->getOfferBids();

  return count($bids);

}


}
