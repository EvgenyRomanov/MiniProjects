<?php

namespace app\src\Infrastructure\Subscriber;

use app\src\Infrastructure\Events\Event;

class HelperService implements SubscriberInterface
{
    public function update(Event $event): void
    {
        print_r($event . PHP_EOL);
    }
}
