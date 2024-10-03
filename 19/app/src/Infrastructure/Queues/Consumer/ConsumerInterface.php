<?php

namespace app\src\Infrastructure\Queues\Consumer;

interface ConsumerInterface
{
    public function run(): void;
}
