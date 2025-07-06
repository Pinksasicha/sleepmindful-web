<?php

function is_login()
{
  $CI = &get_instance();
  if ($CI->session->userdata('id')) {
    $user = new User($CI->session->userdata('id'));
    $id = $user->id;
    return ($id) ? true : false;
  }
}

function user()
{
  $CI = &get_instance();
  $user = null;
  if ($CI->session->userdata('id')) {
    $user = new User($CI->session->userdata('id'));
  }
  return $user;
}

function is_admin_login()
{
  $CI = &get_instance();
  if ($CI->session->userdata('admin_id')) {
    $user = new Administrator($CI->session->userdata('admin_id'));
    $id = $user->id;
    return ($id) ? true : false;
  }
}

function admin()
{
  $CI = &get_instance();
  $user = null;
  if ($CI->session->userdata('admin_id')) {
    $user = new Administrator($CI->session->userdata('admin_id'));
  }
  return $user;
}

function logout()
{
  $CI = &get_instance();
  $CI->session->sess_destroy();
}

function is_owner($user_id)
{
  $CI = &get_instance();
  if ($user_id == $CI->session->userdata('id')) {
    return true;
  } else {
    return false;
  }
}

function get_device()
{
  $CI = &get_instance();
  if ($CI->input->server('PHP_AUTH_USER') == 'android') {
    return 'android';
  }
  return 'ios';
}

function fb_login_url()
{
  $CI = &get_instance();
  $CI->config->load('facebook', true);
  $config = $CI->config->item('facebook');
  $CI->load->library('Facebook', $config);
  $params = [
    'scope' => 'email, user_birthday, user_likes, user_education_history, user_hometown, user_interests, user_activities, user_location, user_about_me, offline_access',
    'display' => 'popup'
  ];
  return $CI->facebook->getLoginUrl($params);
}

function ip_address()
{
  if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_X_FORWARDED_FOR'];
  } elseif (isset($_SERVER['HTTP_X_REAL_IP'])) {
    $_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_X_REAL_IP'];
  }
  return $_SERVER['REMOTE_ADDR'];
}

function fb_logout_url()
{
  // $CI = & get_instance();
  // if($CI->session->userdata('is_facebook'))
  // {
  // 	$CI->config->load("facebook",TRUE);
  // 	$config = $CI->config->item('facebook');
  // 	$CI->load->library('Facebook', $config);
  // 	$params = array(
  // 		'next' => base_url().'users/logout/',
  // 	);
  // 	return $CI->facebook->getLogoutUrl();
  // }
  // else
  // {
  return 'users/logout';
  //}
}

/* End of file auth_helper.php */
/* Location: ./application/helpers/auth_helper.php */
