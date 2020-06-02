<?php

namespace Drupal\enewsletter\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

/**
 * Implements the SubscribeCustomer form controller.
 *
 * This example demonstrates a simple form with a single text input element. We
 * extend FormBase which is the simplest form base class used in Drupal.
 *
 * @see \Drupal\Core\Form\FormBase
 */
class SubscribeCustomer extends FormBase {

  /**
   * Build the simple form.
   *
   * A build form method constructs an array that defines how markup and
   * other form elements are included in an HTML form.
   *
   * @param array $form
   *   Default form array structure.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   Object containing current form state.
   *
   * @return array
   *   The render array defining the elements of the form.
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    // for grouping items under one
    $form['go-and-subscribe'] = array(
      '#type' => 'details',
      '#title' => $this->t('Subscribe to Our Newsletter'),
    );

    $form['leave-subscribe'] = array(
      '#type' => 'details',
      '#title' => $this->t('Remove From Newsletter List '),
    );

    $form['go-and-subscribe']['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Name'),
      '#description' => $this->t('Name must be at least 5 characters in length.'),
      '#required' => TRUE,
    ];

    $form['go-and-subscribe']['email'] = [
      '#type' => 'email',
      '#title' => $this->t('Email'),
      '#description' => $this->t('Use Valid Email!'),
      '#required' => TRUE,
    ];

    $form['go-and-subscribe']['subscribe'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Subscribe'),
      '#description' => $this->t('Subscribe to our E-Newsletter.'),
      '#required' => FALSE,
    ];

    $form['leave-subscribe']['unsubscribe'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Un-Subscribe'),
      '#description' => $this->t('Un-Subscribe -Sorry to see you go!.'),
      '#required' => FALSE,

      '#attributes' => [
        //define static name to make it easier to get ID later
        // 'id' => 'unsubscribe',
        'name' => 'unsubscribe',
      ],
    ];

    $form['leave-subscribe']['unsubscribe_email_field'] = [
      '#type' => 'email',
      '#title' => $this->t('Email'),
      '#description' => $this->t('Use Valid Email!'),
      '#required' => FALSE,

      '#attributes' => [
        // id field
        'id' => 'unsubscribe_email_field',
      ],

      '#states' => [
        //show this textfield only if the uncheck is checked above
        'visible' => [
          ':input[name="unsubscribe"]' => ['checked' => TRUE],
        ],
      ],
    ];


    // Group submit handlers in an actions element with a key of "actions" so
    // that it gets styled correctly, and so that other modules may add actions
    // to the form. This is not required, but is convention.
    $form['actions'] = [
      '#type' => 'actions',
    ];

    // Add a submit button that handles the submission of the form.
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
  }

  /**
   * Getter method for Form ID.
   *
   * The form ID is used in implementations of hook_form_alter() to allow other
   * modules to alter the render array built by this form controller. It must be
   * unique site wide. It normally starts with the providing module's name.
   *
   * @return string
   *   The unique ID of the form defined by this class.
   */
  public function getFormId() {
    return 'enewsletter_subscribe_customer';
  }

  /**
   * Implements form validation.
   *
   * The validateForm method is the default method called to validate input on
   * a form.
   *
   * @param array $form
   *   The render array of the currently built form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   Object describing the current state of the form.
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $name = $form_state->getValue('name');
    if (strlen($name) < 5) {
      // Set an error for the form element with a key of "title".
      $form_state->setErrorByName('name', $this->t('The Name must be at least 5 characters long.'));
    }
  }

  /**
   * Implements a form submit handler.
   *
   * The submitForm method is the default method called for any submit elements.
   *
   * @param array $form
   *   The render array of the currently built form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   Object describing the current state of the form.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    /*
     * This would normally be replaced by code that actually does something
     * with the title.
     */
    $name = $form_state->getValue('name');
    $this->messenger()->addMessage($this->t('Thank you for subscribing: %name.', ['%name' => $name]));
  }

}
