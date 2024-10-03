<?php

use app\src\Infrastructure\Http\CreateApplicationFormAction;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;

return function (App $app) {
    $app->get('/', \app\src\Infrastructure\Http\TestAction::class)->setName('test');
    $app->post('/application_form', CreateApplicationFormAction::class);
};
