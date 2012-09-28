<?php

/**
 * @file
 * This file is empty by default because the base theme chain (Alpha & Omega) provides
 * all the basic functionality. However, in case you wish to customize the output that Drupal
 * generates through Alpha & Omega this file is a good place to do so.
 *
 * Alpha comes with a neat solution for keeping this file as clean as possible while the code
 * for your subtheme grows. Please read the README.txt in the /preprocess and /process subfolders
 * for more information on this topic.
 */
 


function alphorn_preprocess_html(&$vars) {
  $file = theme_get_setting('theme_color') . '-style.css';
  drupal_add_css(path_to_theme() . '/css/' . $file, array(
    'group' => CSS_THEME,
    'weight' => 115,
    'browsers' => array(),
    'preprocess' => FALSE
  ));
  $vars['page']['#children'] = str_replace(' <h1 class="title" id="page-title">emp</h1>', '', $vars['page']['#children']);
}

function alphorn_preprocess_user_profile(&$variables) {
  $account = menu_get_object('user');

  $street = '';
  if (count($account->field_street_number) > 0) {
    $street = $account->field_street_number['und'][0]['value'];
  }
  $date_of_birth = '';
  if (count($account->field_date_of_birth) > 0) {
    $date_of_birth = date('d/m/Y', strtotime($account->field_date_of_birth['und'][0]['value']));
  }
  $city = '';
  if (count($account->field_postal_code) > 0) {
    $city = $account->field_postal_code['und'][0]['value'] . ' ';
  }
  if (count($account->field_city) > 0) {
    $city .= $account->field_city['und'][0]['value'];
  }

  $email = 'M: ' . $account->mail;

  $telephone = '';
  if (count($account->field_phone_number) > 0) {
    $telephone = 'T: ' . $account->field_phone_number['und'][0]['value'];
  } else {
    $telephone = $email;
    $email = '';
  }

  $variables['name'] = $account->field_first_name['und'][0]['value'] . ' ' .
    $account->field_last_name['und'][0]['value'];
  $variables['street'] = $street;
  $variables['date_of_birth'] = $date_of_birth;
  $variables['city'] = $city;
  $variables['telephone'] = $telephone;
  $variables['email'] = $email;
  $variables['since'] = date("d/m/Y", $account->created);

}

function alphorn_preprocess_node(&$variables) {
  $status = $variables['content']['field_status'][0]['#markup'];
 if ($status == "Available") {
   $class = 'green';
 } else {
   $class = 'red';
 }
  $variables['content']['field_status'][0]['#markup'] = "<div class='$class'>$status</div>";

}