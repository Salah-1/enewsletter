<?php

namespace Drupal\enewsletter\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Ajax\AjaxResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Returns responses for enewsletter routes.
 */
class EnewsletterController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function build() {

    $build['content'] = [
      '#type' => 'item',
      '#markup' => $this->t('from src/Controller/EnewsletterController -It works!'),
    ];

    return $build;
  }

/**
 * Route callback for hiding or showing something like link
 * @param \Symfony\Component\HttpFoundation\Request $request;
 *  
 */
public function hideOrShowLink(Request $request) {
  // div class for subscribe = js-form-item form-item js-form-type-checkbox
  // subscribe id = edit-subscribe

  if (!$request->isXmlHttpRequest()) {
    throw new NotFoundHttpException();
  }

  // $response = new AjaxResponse();
  // $command = new RemoveCommand('.block-wrapper-selector');
  // $response->addCommand($command);
  // return $response;


  $markup = "<h1>Hello</h1>";
  $output = "<div id='edit-ajax-textfield'>$markup</div>";
  return ['#markup' => $output];


 } //End hideOrShowLink funciton
}
