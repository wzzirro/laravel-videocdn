<?php

namespace Wzzirro\VideoCdn\Models;

class TvSeriesEpisodes extends AbstractModel
{
    /**
     * @see https://videocdn.tv/docs/tv-series/episodes
     *
     * @param array $params
     *
     * @return mixed
     */
    public function call(array $params = [])
    {
        $response = $this->get('tv-series/episodes', $params);

        $response = json_decode($response);

        return $response;
    }
}
