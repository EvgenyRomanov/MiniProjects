<?php

// Should be set to 0 in production
error_reporting(E_ALL);

// Should be set to '0' in production
ini_set('display_errors', '1');

// Timezone
date_default_timezone_set('Europe/Moscow');

// Settings
$settings = [];

// Path settings
$settings['root'] = dirname(__DIR__);

// Error Handling Middleware settings
$settings['error'] = [

    // Should be set to false in production
    'display_error_details' => true,

    // Parameter is passed to the default ErrorHandler
    // View in rendered output by enabling the "displayErrorDetails" setting.
    // For the console and unit tests we also disable it
    'log_errors' => true,

    // Display error details in error log
    'log_error_details' => true,
];

$settings['RABBITMQ_DEFAULT_USER'] = $_ENV['RABBITMQ_DEFAULT_USER'];
$settings['RABBITMQ_DEFAULT_PASS'] = $_ENV['RABBITMQ_DEFAULT_PASS'];
$settings['QUEUE'] = $_ENV['QUEUE'];
$settings['MYSQL_PASSWORD'] = $_ENV['MYSQL_PASSWORD'];
$settings['MYSQL_HOST'] = $_ENV['MYSQL_HOST'];
$settings['MYSQL_ROOT_HOST'] = $_ENV['MYSQL_ROOT_HOST'];
$settings['MYSQL_DATABASE'] = $_ENV['MYSQL_DATABASE'];
$settings['MYSQL_USER'] = $_ENV['MYSQL_USER'];

return $settings;
