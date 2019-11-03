<?php

namespace Wzzirro\VideoCdn\Models;

class TvSeriesSeasons extends AbstractModel
{
    /**
     * @see https://videocdn.tv/docs/tv-series/seasons
     *
     * @param array $params
     *
     * @return mixed
     */
    public function call(array $params = [])
    {
        $response = $this->get('tv-series/seasons', $params);

        $response = json_decode($response);

        return $response;
    }
}
