<?php

namespace app\src\Infrastructure\Publisher;

use app\src\Infrastructure\Events\Event;
use app\src\Infrastructure\Subscriber\SubscriberInterface;

interface PublisherInterface
{
    public function subscribe(SubscriberInterface $subscriber): void;
    public function unsubscribe(SubscriberInterface $subscriber): void;
    public function notify(Event $event): void;
}
