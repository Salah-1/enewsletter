<?php

namespace Drupal\enewsletter\Plugin\Block;

use Drupal\Core\Block\BlockBase;

//use Drupal\Core\Access\AccessResult;
//use Drupal\Core\Ajax\RemoveCommand;
//use Symfony\Component\DependencyInjection\ContainerInterface;


use Drupal\Core\Url;


/**
 * Provides an example block.
 *
 * @Block(
 *   id = "enewsletter_ajax_example",
 *   admin_label = @Translation("Ajax-Example-Block"),
 *   category = @Translation("enewsletter")
 * )
 */
class AjaxExampleBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];


    $build[] = [
      '#theme' => 'container',
      '#children' => [
        '#markup' => $this->t('This Block show Ajax moves!'),
      ]
    ];
    // prepare the url to be used
    $url = Url::fromRoute('enewsletter.block-show-or-hide-link-html');
    $url->setOption('attributes', ['class' => 'use-ajax']);
    $build[] = [
      '#type' => 'link',
      '#url' => $url,
      '#title' => $this->t('click this link to show contents'),
   ];

    $build[] = [
      '#type' => 'textfield',
      '#size' => '200',
      '#disabled' => TRUE,
      '#value' => 'Hello, Drupal!!1',
      '#prefix' => '<div id="edit-ajax-textfield">',
      '#suffix' => '</div>',
    ];
    return $build;
  } // End build funciton


}
