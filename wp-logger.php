<?php

/**
 * Plugin Name: Larasoft WPLogger
 * Plugin URI: http://google.com
 * Description: The very first plugin that I have ever created.
 * Version: 1.0
 * Author: Ricky Andhika
 * Author URI: http://google.com
 */

use Larasoft\WPLogger\WPLogger;

require 'vendor/autoload.php';

if (! function_exists( 'larasoft_log_signin' )) {
    function larasoft_log_signin ($user_login, $user) {
        $logger = WPLogger::init([
            'name' => 'larasoft_wplogger',
            'file_path' => 'larasoft-wplogger.log'
        ]);
        $logger->logSignInEvent([
            'user_name' => $user->get('user_login'),
            'roles' => $user->roles,
            'ip_address' => $_SERVER['REMOTE_ADDR']
        ]);
    }
}

if (! function_exists( 'larasoft_log_signout' )) {
    function larasoft_log_signout () {
        $user = wp_get_current_user();
        $logger = WPLogger::init([
            'name' => 'larasoft_wplogger',
            'file_path' => 'larasoft-wplogger.log'
        ]);
        $logger->logSignOutEvent([
            'user_name' => $user->get('user_login'),
            'roles' => $user->roles,
            'ip_address' => $_SERVER['REMOTE_ADDR']
        ]);
    }
}

add_action('wp_login', 'larasoft_log_signin', 10, 2);
add_action('clear_auth_cookie', 'larasoft_log_signout', 10);