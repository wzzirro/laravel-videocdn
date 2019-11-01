<?php

namespace wzzirro\videocdn;

use GuzzleHttp\Client as GuzzleClient;

class Request
{
    private $client;

    public function __construct(string $apiUrl, string $apiToken, string $defaultUserAgent)
    {
        $this->client = new GuzzleClient([
            'base_uri' => $apiUrl,
            'headers'  => [
                'User-Agent' => $_SERVER['HTTP_USER_AGENT'] ?? $defaultUserAgent,
            ],
            'query'    => [
                'api_token' => $apiToken,
            ]
        ]);
    }

    public function get($action, $params = [])
    {
        $request = $this->client->get($action, [
            'query' => array_merge(
                $this->client->getConfig('query'),
                $params
            ),
        ]);

        return $request->getBody()->getContents();
    }
}