<?php

namespace app\tests;

use app\src\Infrastructure\Exception\CardExpirationException;
use app\src\Infrastructure\Exception\CardHolderException;
use app\src\Infrastructure\Exception\CardNumberException;
use app\src\Infrastructure\Exception\CvvException;
use app\src\Infrastructure\Exception\OrderNumberException;
use app\src\Infrastructure\Exception\SumException;
use app\src\Infrastructure\Request\Request;
use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{
    public function testInvalidCardNumber(): void
    {
        $this->expectException(CardNumberException::class);
        $data = [
            "card_number" => "12",
            "card_holder" => "Test Test",
            "card_expiration" => "10/25",
            "cvv" => "123",
            "order_number" => "213",
            "sum" => "10"
        ];
        $request = new Request(json_encode($data));
        $request->validate();
    }

    public function testInvalidCardHolder(): void
    {
        $this->expectException(CardHolderException::class);
        $data = [
            "card_number" => "1111111111111111",
            "card_holder" => "Test Test!",
            "card_expiration" => "10/25",
            "cvv" => "123",
            "order_number" => "213",
            "sum" => "10"
        ];
        $request = new Request(json_encode($data));
        $request->validate();
    }

    public function testInvalidCardExpiration(): void
    {
        $this->expectException(CardExpirationException::class);
        $data = [
            "card_number" => "1111111111111111",
            "card_holder" => "Test Test",
            "card_expiration" => "10:25",
            "cvv" => "123",
            "order_number" => "213",
            "sum" => "10"
        ];
        $request = new Request(json_encode($data));
        $request->validate();
    }

    public function testInvalidCvv(): void
    {
        $this->expectException(CvvException::class);
        $data = [
            "card_number" => "1111111111111111",
            "card_holder" => "Test Test",
            "card_expiration" => "10/25",
            "cvv" => "1234",
            "order_number" => "213",
            "sum" => "10"
        ];
        $request = new Request(json_encode($data));
        $request->validate();
    }

    public function testInvalidOrderNumber(): void
    {
        $this->expectException(OrderNumberException::class);
        $data = [
            "card_number" => "1111111111111111",
            "card_holder" => "Test Test",
            "card_expiration" => "10/25",
            "cvv" => "123",
            "order_number" => "213a",
            "sum" => "10"
        ];
        $request = new Request(json_encode($data));
        $request->validate();
    }

    public function testInvalidSum(): void
    {
        $this->expectException(SumException::class);
        $data = [
            "card_number" => "1111111111111111",
            "card_holder" => "Test Test",
            "card_expiration" => "10/25",
            "cvv" => "123",
            "order_number" => "213",
            "sum" => "10.1"
        ];
        $request = new Request(json_encode($data));
        $request->validate();
    }

    public function testValidData(): void
    {
        $data = [
            "card_number" => "1111111111111111",
            "card_holder" => "Test Test",
            "card_expiration" => "10/25",
            "cvv" => "123",
            "order_number" => "213",
            "sum" => "10"
        ];
        $request = new Request(json_encode($data));
        $request->validate();
        $this->assertTrue(true);
    }
}
