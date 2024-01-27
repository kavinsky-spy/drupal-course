<?php

namespace Drupal\bid\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Exception\MissingOptionsException;


/**
 * Requires an bid entity to have all fields required to save as an object.
 *
 * @constraint(
 *  id = "AllFieldsRequired",
 *  label = @Translation("All fields required.", context = "Validation"),
 *  type = "entity:bid"
 * )
 */
class AllFieldsRequiredConstraint extends Constraint {
  public $message = 'At least one field was empty and prevented saving the bid.';
}
