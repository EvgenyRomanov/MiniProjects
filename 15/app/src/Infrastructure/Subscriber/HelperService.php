<?php

namespace App\Infrastructure\Subscriber;

use App\Infrastructure\Events\Interfaces\EventInterface;

class HelperService implements SubscriberInterface
{
    public function update(EventInterface $event): void
    {
        print_r($event . PHP_EOL);
    }
}
