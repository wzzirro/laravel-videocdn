<?php

namespace Wzzirro\VideoCdn\Models;

class TvSeries extends AbstractModel
{
    /**
     * @see https://videocdn.tv/docs/tv-series
     *
     * @param array $params
     *
     * @return mixed
     */
    public function call(array $params = [])
    {
        $response = $this->get('tv-series', $params);

        $response = json_decode($response);

        return $response;
    }
}
