<?php

use App\Infrastructure\Http\CreateApplicationFormAction;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;

return function (App $app) {
    $app->get('/', \App\Infrastructure\Http\TestAction::class)->setName('test');
    $app->post('/application_form', CreateApplicationFormAction::class);
};
