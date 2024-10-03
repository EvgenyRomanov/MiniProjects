<?php

namespace app\tests\PayService;

use app\src\Infrastructure\PayService\SomeApiPayServiceInterface;

class DummyPayServiceNegative implements SomeApiPayServiceInterface
{
    public function sendRequest(): int
    {
        return 403;
    }
}
