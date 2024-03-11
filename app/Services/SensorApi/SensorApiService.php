<?php

namespace App\Services\SensorApi;

use GuzzleHttp\Client;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class SensorApiService
{
    private Client $client;
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('sensor.base_url'),
            'http_errors' => false,
        ]);
    }

    /**
     * @param int|null $sensorId
     * @return string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getTemperature(?int $sensorId = null): ?string
    {
        $response = $this->client->get(config('sensor.temperature'));

        $status = $response->getStatusCode();

        if ($status !== Response::HTTP_OK) {
            logger()->warning(__METHOD__, [
                'code' => $status,
                'message' => $response->getReasonPhrase(),
                'body' => $response->getBody(),
            ]);

            return null;
        }

        return $this->parseBody($response->getBody()->getContents());
    }

    /**
     * @param int|null $sensorId
     * @return string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getPressure(?int $sensorId = null): ?string
    {
        $response = $this->client->get(config('sensor.pressure'));

        $status = $response->getStatusCode();

        if ($status !== Response::HTTP_OK) {
            logger()->warning(__METHOD__, [
                'code' => $status,
                'message' => $response->getReasonPhrase(),
                'body' => $response->getBody(),
            ]);

            return null;
        }

        return $this->parseBody($response->getBody()->getContents());
    }

    /**
     * @param int|null $sensorId
     * @return string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getRevolutions(?int $sensorId = null): ?string
    {
        $response = $this->client->get(config('sensor.revolutions'));

        $status = $response->getStatusCode();

        if ($status !== Response::HTTP_OK) {
            logger()->warning(__METHOD__, [
                'code' => $status,
                'message' => $response->getReasonPhrase(),
                'body' => $response->getBody(),
            ]);

            return null;
        }

        return $this->parseBody($response->getBody()->getContents());
    }

    private function parseBody(string $body)
    {
        if (Str::contains($body, '=')) {
            logger()->warning(__METHOD__, [
                'message' => 'Wrong format',
                'body' => $body,
            ]);

            return null;
        }

        return explode('=', $body)[1];
    }
}
