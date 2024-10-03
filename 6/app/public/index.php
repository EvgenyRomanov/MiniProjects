<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\VerificationEmail;

$listEmails = ['bla-bla', 'e.romanov93@yandex.ru'];
$app = new VerificationEmail();
print_r($app->validateEmails($listEmails));
