<?php

namespace app\src\Infrastructure\Response;

interface ResponseInterface
{
    public function toJson(): string;
}
