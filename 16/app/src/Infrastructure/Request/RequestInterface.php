<?php

namespace app\src\Infrastructure\Request;

interface RequestInterface
{
    public function toArray(): array;

    public function validate(): void;
}
