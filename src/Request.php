<?php

namespace wzzirro\videocdn;

use GuzzleHttp\Client as GuzzleClient;

class Request
{
    private $client;

    public function __construct()
    {
//        $this->client = new GuzzleClient([
//            'base_uri' => config('videocdn.apiUrl'),
//            'headers'  => [
//                'User-Agent' => $_SERVER['HTTP_USER_AGENT'] ?? config('videocdn.defaultUserAgent'),
//            ],
//            'query'    => [
//                'api_token' => config('videocdn.apiToken'),
//            ]
//        ]);
        $this->client = new GuzzleClient([
            'base_uri' => 'https://videocdn.tv/api/',
            'headers'  => [
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36',
            ],
            'query'    => [
                'api_token' => '5iW5PydmPpOW6oO9odmRwVSgoSr7iiRZ',
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