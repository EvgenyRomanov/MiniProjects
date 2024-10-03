<?php

use App\ConsoleChat;

require_once __DIR__ . '/../vendor/autoload.php';

try {
    $app = new ConsoleChat();
    $app->run();
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}
