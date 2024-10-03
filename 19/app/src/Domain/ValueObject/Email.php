<?php

namespace app\src\Domain\ValueObject;

class Email extends AbstractValueObject
{
    protected function validation(string $value): void
    {
        return;
    }
}
