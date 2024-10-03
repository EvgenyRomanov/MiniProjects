<?php

namespace App\Domain\ValueObject;

class Name extends AbstractValueObject
{
    protected function validation(string $value): void
    {
        return;
    }
}
