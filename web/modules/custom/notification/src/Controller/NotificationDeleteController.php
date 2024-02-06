<?php

namespace Drupal\notification\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\notification\Entity\Notification;
use Drupal\Core\Access\AccessResult;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Url;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Drupal\notification\Ajax\DeleteNotificationCommand;

/**
 *  Class NotificationDeleteController
 */
class NotificationDeleteController extends ControllerBase {
  public function render($id, $method) {

    // Load the notification
    $notification = Notification::load($id);

    // Send back users that do not have access
    if(!$notification) {
      return AccessResult::forbidden();
    }

    if(!$notification->access('delete')) {
      return AccessResult::forbidden();
    }

    // Delete notification
    $notification->delete();

    if($method == 'ajax') {
      $response = new AjaxResponse();
      $response->addCommand(new DeleteNotificationCommand());
      return $response;
    } else {
      $path = Url::fromRoute('view.notifications.page_1')->toString();
      $response = new RedirectResponse($path);
      $response->send();
    }

    return $response;


  }
}
