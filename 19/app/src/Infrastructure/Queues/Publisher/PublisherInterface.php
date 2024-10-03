<?php

namespace app\src\Infrastructure\Queues\Publisher;

interface PublisherInterface
{
    public function publish(string $message): void;
}
