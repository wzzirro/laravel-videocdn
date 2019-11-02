<?php


namespace Wzzirro\VideoCdn\Models\animeTvSeries;


use Wzzirro\VideoCdn\Models\AbstractModel;

class AnimeTvSeriesSeasons extends AbstractModel
{
    /**
     * @see https://videocdn.tv/docs/anime-tv-series/seasons
     *
     * @param array $params
     *
     * @return mixed
     */
    public function call(array $params = [])
    {
        $response = $this->get('anime-tv-series/seasons', $params);

        $response = json_decode($response);

        return $response;
    }
}
