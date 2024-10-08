<?php

use App\Infrastructure\Http\{GetApplicationFormAction};
use App\Infrastructure\Http\CreateApplicationFormAction;
use Slim\App;

return function (App $app) {
    $app->get('/api/v1/application_form/{id}', GetApplicationFormAction::class);
    $app->get('/api/v1/application_form', GetApplicationFormAction::class);
    $app->post('/api/v1/application_form', CreateApplicationFormAction::class);
};
