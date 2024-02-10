<?php

namespace Drupal\offer\StackMiddleware;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Executes redirect before the main kernel takes over the request.
 */
class UserLoginMiddleware implements HttpKernelInterface {

  /**
   * The wrapped HTTP Kernel.
   *
   * @var \Symfony\Component\HttpKernel\HttpKernelInterface
   */
  protected $httpKernel;

  /**
   * The redirect Url.
   *
   * @var \Symfony\Component\HttpFoundation\RedirectResponse
   */
  protected $redirectResponse;

  /**
   *  Constructs a UserLoginMiddleware object.
   *
   *  @param \Symfony\Component\HttpKernel\HttpKernelInterface $http_kernel
   *  The decorated kernel.
   */
  public function __construct(HttpKernelInterface $http_kernel) {
    $this->httpKernel = $http_kernel;
  }

  /**
   * {@inheritDoc}
   */
  public function handle(Request $request, $type = HttpKernelInterface::MAIN_REQUEST, $catch = TRUE): Response {
    $response = $this->httpKernel->handle($request, $type, $catch);

    return $this->redirectResponse ?: $response;
  }


  /**
   * Stores the requested redirect response.
   *
   * @param \Symfoney\Component\HttpFoundation\RedirectResponse|null $redirectResponse
   *  Redirect response.
   */
  public function setRedirectResponse(?RedirectResponse $redirectResponse) {
    $username = \Drupal::currentUser()->getDisplayName();

    \Drupal::messenger()->addStatus(t('Welcome %name, happy bidding!', [
      '%name' => $username
    ]));

    $this->redirectResponse = $redirectResponse;
  }
}
