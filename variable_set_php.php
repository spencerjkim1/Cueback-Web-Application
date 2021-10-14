<?php

/**
 * @file
 * File for declaring the global variable.
 */

define('DRUPAL_ROOT', getcwd());

include_once DRUPAL_ROOT . '/includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

variable_set('external_site_url', "http://admin.cueback.com");
echo variable_get('external_site_url', 'Done');
variable_set('external_site_admin_mail_id', "admin@cueback.com");
echo variable_get('external_site_admin_mail_id', 'Done');
variable_set('CAPTCHA_SITE_KEY', '6LfFEDcUAAAAAC9Fchh9XNkQUdK8k2iu3HrUKYV_');
echo variable_get('CAPTCHA_SITE_KEY', 'Done');
exit;
