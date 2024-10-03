<?php

namespace app\src\Infrastructure\Notification;

interface EmailNotificationInterface
{
    public function send(string $message, string $subject, string $email): void;
}
