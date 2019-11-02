<?php

namespace Wzzirro\VideoCdn;

use GuzzleHttp\Client as GuzzleClient;

class Request
{
    private $client;
    public  $parameters;

    public function __construct($parameters)
    {
        $this->parameters = $parameters;

        $this->client = new GuzzleClient([
            'base_uri' => $parameters['apiUrl'],
            'headers'  => [
                'User-Agent' => $_SERVER['HTTP_USER_AGENT'] ?? $parameters['defaultUserAgent'],
            ],
            'query'    => [
                'api_token' => $parameters['apiToken'],
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