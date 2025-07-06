<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//facebook api information goes here

$config['api_id']       = '241704596602515';
$config['api_secret']   = '49bb3103c371441a0ea1e08d4f4abf7c';
$config['redirect_url'] = base_url().'login';  //change this if you are not using my fb controller
$config['logout_url']   = base_url().'logout';          //User will be redirected here when he logs out.
$config['permissions']  = array(
                                    'email', 
                                    'public_profile',
                                    'user_birthday',
                                    'user_hometown',
                                    'user_likes',
                                    'user_location',
                                    'user_tagged_places',
                                    'user_gender',
                                    'user_age_range',
                                    'pages_messaging'
                                );

