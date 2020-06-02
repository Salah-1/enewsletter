# Drupal-9 Example to show following
Drupal Ajax callbacks and other FormAPI aspects(details vs fieldset)
Ajax callbacks for form element and links.

This project demonstrates  (I) Drupal 9 Ajax callback setup.
                           (II) Responding to Ajax callsbacks from Drupal.
                           (III) writing FunctionalJavascript tests for the code (To be done later).
# In nutshell what needs to be done
Have a form with checkbox.
When that checkbox is checked show new textfield for the email.
Then write the test cases for such a code.

# Steps
1. First group form elemnts under details element
2. subscribe to our newsletter with name & email
3. Un-subscribe link clicked trigers ajax & shows un-subscribe box 4 email
    this should be hidden priot to clicking
4. Update #3 is now shown on Block

Relevent code:
            src/Controller/EnewsletterController.php
            src/Form/SubscribeCustomer.php
            src/Plugin/Block/AjaxExampleBlock.php


