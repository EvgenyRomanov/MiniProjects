<?php

namespace app\tests\PayService;

use app\src\Infrastructure\PayService\SomeApiPayServiceInterface;

class DummyPayServicePositive implements SomeApiPayServiceInterface
{
    public function sendRequest(): int
    {
        return 200;
    }
}
