<?php
/**
 * @file
 * Bulk upload hotels for #1443.
 */

ini_set('display_error', 1);
define('DRUPAL_ROOT', getcwd());
set_time_limit(0);
ini_set('memory_limit', '2G');
require_once DRUPAL_ROOT . '/includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
global $user;

retrive_prompts();
watchdog('prompt_of_the_week', 'Prompt mail retreive');