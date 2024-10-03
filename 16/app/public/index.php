<?php

require_once __DIR__ . "/../vendor/autoload.php";

use app\src\Infrastructure\Controllers\SomeController;
use app\src\Infrastructure\PayService\SomeApiPayService;
use app\src\Infrastructure\Repository\SomeRepository;
use app\src\Infrastructure\Request\Request;

$stringJson = '{"card_number":"12","card_holder":"Test Test","card_expiration":"10/25","cvv":123,"order_number":"213","sum":10}';
$stringJson1 = '{"card_number":"1111111111111111","card_holder":"Test Test","card_expiration":"10/25","cvv":123,"order_number":"213","sum":10}';

$payService = new SomeApiPayService();
$repository = new SomeRepository();
$request = new Request($stringJson1);

$response =  (new SomeController())->someAction($request, $repository, $payService);
var_dump($response);
