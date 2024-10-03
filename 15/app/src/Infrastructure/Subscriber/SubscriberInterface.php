<?php

namespace app\src\Infrastructure\Subscriber;

use app\src\Infrastructure\Events\Event;

interface SubscriberInterface
{
    public function update(Event $event): void;
}
