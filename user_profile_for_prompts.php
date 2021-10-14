<?php

ini_set('display_error', 1);
define('DRUPAL_ROOT', getcwd());
set_time_limit(0);
ini_set('memory_limit', '2G');
require_once DRUPAL_ROOT . '/includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
global $user;
$i = 0;

if ($user->uid != 1) {
  echo "You need to login as administrator before you can execute this script. ";
  exit;
}

$params['uid'] = 603;
echo "<pre>";

$user_profile_data_final = array();
$user_profile_data = get_user_profile_form_elements($params);
//print_r($user_profile_data);

$user_profile_data_final['uid'] = $params['uid'];
foreach ($user_profile_data as $field_key => $field_value) {
  foreach ($field_value as $childer_key => $children_value) {
    if (isset($children_value['children'])) {
      foreach ($children_value['children'] as $group1_key => $group1_value) {
        foreach ($group1_value as $group2_key => $group2_value) {
          if ($group2_value['all_fields']) {
            $group2_fields = $group2_value['all_fields'];
            foreach ($group2_fields as $field_key => $field_value) {
              if (isset($field_value['values']) || isset($field_value['current_value'])) {
                $user_profile_data_final = get_user_profile_data_from_array($field_value, $user_profile_data_final);
              }      
              else if (isset($field_value['collection_fields'])) {
                for ($i = 0; $i <= count($field_value['collection_fields']); $i++) {
                  $user_profile_data_final = get_user_profile_data_from_array($field_value['collection_fields'][$i], $user_profile_data_final);
                }
              }
            }
          }
        }
      }
    }
    else {
      $group2_fields = $children_value['all_fields'];
      foreach ($group2_fields as $field_key => $field_value) {
        if (isset($field_value['values']) || isset($field_value['current_value'])) {
          $user_profile_data_final = get_user_profile_data_from_array($field_value, $user_profile_data_final);
        }
        else if (isset($field_value['collection_fields'])) {
          for ($i = 0; $i <= count($field_value['collection_fields']); $i++) {
            $user_profile_data_final = get_user_profile_data_from_array($field_value['collection_fields'][$i], $user_profile_data_final);
          }
        }
      }
    }
  }
}

print_r(json_encode($user_profile_data_final));

function get_user_profile_data_from_array($field_value, $user_profile_data_final) {
  //print_r($field_value); //die;
  if (isset($field_value['values'])) {
    foreach ($field_value['values'] as $key => $value) {
      if ($field_value['field_name'] == 'field_person_country') {
        if (in_array($key, $field_value['current_value'][0])) {
          $user_profile_data_final[$field_value['field_name']][$key] = $value;
        }
      }
      else if ($field_value['field_name'] == 'field_relationship_satus') {
        $user_profile_data_final[$field_value['field_name']][$field_value['current_value'][0]['value']] = $field_value['current_value'][0]['value'];
      }
      else if (in_array($key, $field_value['current_value'])) {
        $user_profile_data_final[$field_value['field_name']][$key] = $value;
      }
    }
  }
  else if (isset($field_value['current_value'])) {
    foreach ($field_value['current_value'] as $key => $value) {
      $user_profile_data_final[$field_value['field_name']][$key] = $value['value'];
      if (isset($value['value2'])) {
        $user_profile_data_final[$field_value['field_name']][$key] .= ' | ' .  $value['value2'];
      }
    }
  }
  return $user_profile_data_final;
}