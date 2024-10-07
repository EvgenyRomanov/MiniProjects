<?php

namespace App\Infrastructure\Subscriber;

use App\Infrastructure\Events\Interfaces\EventInterface;

interface SubscriberInterface
{
    public function update(EventInterface $event): void;
}
