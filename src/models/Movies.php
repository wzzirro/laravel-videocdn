<?php


namespace Wzzirro\VideoCdn\Models;


class Movies extends AbstractModel
{
    /**
     * @see https://videocdn.tv/docs/movies
     *
     * @param array $params
     *
     * @return mixed
     */
    public function list(array $params = [])
    {
        $response = $this->get('movies', $params);

        $response = json_decode($response);

        return $response->data;
    }
}
