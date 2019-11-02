<?php


namespace Wzzirro\VideoCdn\Models;


class Animes extends AbstractModel
{
    /**
     * @see https://videocdn.tv/docs/animes
     *
     * @param array $params
     *
     * @return mixed
     */
    public function list(array $params = [])
    {
        $response = $this->get('animes', $params);

        $response = json_decode($response);

        return $response;
    }
}
