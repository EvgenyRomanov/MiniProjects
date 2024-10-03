<?php

namespace app\src\Domain\Entity;

use app\src\Domain\ValueObject\Email;
use app\src\Domain\ValueObject\Message;

class ApplicationForm
{
    private Email $email;
    private Message $message;
    private ?int $id = null;

    public function __construct(Email $email, Message $message)
    {
        $this->email = $email;
        $this->message = $message;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function setEmail(Email $email): void
    {
        $this->email = $email;
    }

    public function getMessage(): Message
    {
        return $this->message;
    }

    public function setMessage(Message $message): void
    {
        $this->message = $message;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}
