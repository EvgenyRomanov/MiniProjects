<?php

use App\Domain\Repository\ApplicationFormInterface;
use App\Domain\Repository\StatusInterface;
use App\Infrastructure\Queues\Publisher\PublisherInterface;
use App\Infrastructure\Queues\Publisher\RabbitMQPublisher;
use App\Infrastructure\Repository\RepositoryApplicationFormDb;
use App\Infrastructure\Repository\RepositoryStatusDb;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Slim\App;
use Slim\Factory\AppFactory;
use Slim\Middleware\ErrorMiddleware;

return [
    'settings' => function () {
        return require __DIR__ . '/settings.php';
    },

    App::class => function (ContainerInterface $container) {
        AppFactory::setContainer($container);

        return AppFactory::create();
    },

    ResponseFactoryInterface::class => function (ContainerInterface $container) {
        return $container->get(App::class)->getResponseFactory();
    },

    ApplicationFormInterface::class => function (ContainerInterface $container) {
        return $container->get(RepositoryApplicationFormDb::class);
    },

    StatusInterface::class => function (ContainerInterface $container) {
        return $container->get(RepositoryStatusDb::class);
    },

    ErrorMiddleware::class => function (ContainerInterface $container) {
        $app = $container->get(App::class);
        $settings = $container->get('settings')['error'];

        return new ErrorMiddleware(
            $app->getCallableResolver(),
            $app->getResponseFactory(),
            (bool) $settings['display_error_details'],
            (bool) $settings['log_errors'],
            (bool) $settings['log_error_details']
        );
    },

    \Bunny\Client::class => function (ContainerInterface $container) {
        return new \Bunny\Client([
            'host'      => 'rabbitmq',
            'vhost'     => '/',
            'user'      => $container->get('settings')['RABBITMQ_DEFAULT_USER'],
            'password'  => $container->get('settings')['RABBITMQ_DEFAULT_PASS'],
        ]);
    },

    PublisherInterface::class => function (ContainerInterface $container) {
        return new RabbitMQPublisher($container->get(\Bunny\Client::class));
    },

    \PDO::class => function (ContainerInterface $container) {
        $host = $container->get('settings')['MYSQL_HOST'];
        $db = $container->get('settings')['MYSQL_DATABASE'];
        $user = $container->get('settings')['MYSQL_USER'];
        $password = $container->get('settings')['MYSQL_PASSWORD'];

        $pdo =  new \PDO(
            "mysql:host={$host};dbname={$db}",
            $user,
            $password
        );
        $pdo->exec('SET NAMES UTF8');

        return $pdo;
    }
];
