<?php declare(strict_types = 1);

namespace Drupal\custom_configuration\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a social links block.
 *
 * @Block(
 *   id = "custom_configuration_social_links",
 *   admin_label = @Translation("Social links"),
 *   category = @Translation("Custom"),
 * )
 */
final class SocialLinksBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build(): array {

    $config = \Drupal::config('custom_configuration.settings');
    //get facebook url
    $facebook = $config->get('facebook');
    //get twitter url
    $twitter = $config->get('twitter');

    //use a template
    $build = [
      '#theme' => 'social_links',
      '#facebook' => $facebook,
      '#twitter' => $twitter,
      '#cache' => [
        'max-age' => 0, //disable cache
      ]
    ];

    return $build;
  }

}
