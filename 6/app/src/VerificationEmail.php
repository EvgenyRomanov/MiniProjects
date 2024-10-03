<?php

namespace App;

use CurlHandle;

class VerificationEmail
{
    protected string $api;
    protected bool|CurlHandle $curl;
    protected string $method;
    protected ?string $apiKey;
    protected string $contentType;

    public function __construct(
        string $api = 'https://api.siterelic.com/dnsrecord',
        string $method = 'POST',
        string $contentType = 'application/json'
    ) {
        $this->api = $api;
        $this->curl = curl_init($this->api);
        $this->method = $method;
        $this->apiKey = $_ENV['API_KEY'] ?? null;
        $this->contentType = $contentType;
    }

    public function __destruct()
    {
        curl_close($this->curl);
    }

    public function validateEmails(array $list): array
    {
        return array_filter($list, function ($item) {
            return filter_var($item, FILTER_VALIDATE_EMAIL)
                && $this->checkMXRecord($item);
        });
    }

    /**
     * @see https://siterelic.com/docs#getting-started
     */
    protected function checkMXRecord(string $email): bool
    {
        $data = [
            'url' => $email
        ];
        $curl = $this->curl;
        $this->curlSetOpt($curl, $data);
        $result = $this->curlExec($curl);

        if (isset($result['data']['MX'])) {
            return true;
        }

        return false;
    }

    protected function curlSetOpt(CurlHandle $curl, array $data): void
    {
        $payload = json_encode($data, JSON_UNESCAPED_UNICODE);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $this->method);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $curl,
            CURLOPT_HTTPHEADER,
            [
                'Content-Type: ' . $this->contentType,
                'Content-Length: ' . mb_strlen($payload),
                'x-api-key: ' . $this->apiKey,
            ]
        );
    }

    protected function curlExec(CurlHandle $curl): array
    {
        return json_decode(curl_exec($curl), true);
    }

    public function getApi(): string
    {
        return $this->api;
    }

    public function setApi(string $api): void
    {
        $this->api = $api;
    }

    public function setMethod(string $method): void
    {
        $this->method = $method;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getApiKey(): ?string
    {
        return $this->apiKey;
    }

    public function setApiKey(?string $apiKey): void
    {
        $this->apiKey = $apiKey;
    }

    public function setContentType(string $contentType): void
    {
        $this->contentType = $contentType;
    }

    public function getContentType(): string
    {
        return $this->contentType;
    }
}
