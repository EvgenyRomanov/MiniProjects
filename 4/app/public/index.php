<?php

use App\Validator;

require_once __DIR__ . '/../vendor/autoload.php';

if (! empty($_POST['string'])) {
    $expression = $_POST['string'];
    $expressionIsCorrect = Validator::checkIfBalanced($expression);

    if ($expressionIsCorrect) {
        http_response_code(200);
        exit("Выражение корректно");
    }
}

http_response_code(400);
exit("Выражение не корректно");
