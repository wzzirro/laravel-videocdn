<?php


namespace wzzirro\videocdn;


use AmoCRM\Helpers\Fields;
use AmoCRM\Request\CurlHandle;
use AmoCRM\Request\ParamsBag;
use Exception;
use Wzzirro\VideoCdn\Helpers\Formatter;
use Wzzirro\VideoCdn\Models\ModelInterface;

class VideoCdn
{
    public $parameters;

    public function __construct(string $apiUrl, string $apiToken, string $defaultUserAgent)
    {
        $this->parameters['apiUrl']           = $apiUrl;
        $this->parameters['apiToken']         = $apiToken;
        $this->parameters['defaultUserAgent'] = $defaultUserAgent;
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