<?php

namespace Wzzirro\VideoCdn;

use Exception;
use GuzzleHttp\Client as GuzzleClient;
use wzzirro\videocdn\helpers\Formatter;
use Wzzirro\VideoCdn\Models\ModelInterface;

class Request
{
    private $client;
    public  $parameters;

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

    /**
     * @param $name
     *
     * @return ModelInterface
     * @throws Exception
     */
    public function __get($name)
    {
        $classname = '\\Wzzirro\VideoCdn\Models\\' . Formatter::camelCase($name);
        if (!class_exists($classname)) {
            throw new Exception('Model does not exists: ' . $name);
        }

        return new $classname($this->parameters);
    }
}