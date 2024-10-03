<?php

namespace App\Domain\ValueObject;

class Message extends AbstractValueObject
{
    protected function validation(string $value): void
    {
        return;
    }
}
