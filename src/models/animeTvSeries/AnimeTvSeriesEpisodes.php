<?php


namespace Wzzirro\VideoCdn\Models\animeTvSeries;


use Wzzirro\VideoCdn\Models\AbstractModel;

class AnimeTvSeriesEpisodes extends AbstractModel
{
    /**
     * @see https://videocdn.tv/docs/anime-tv-series/episodes
     *
     * @param array $params
     *
     * @return mixed
     */
    public function list(array $params = [])
    {
        $response = $this->get('anime-tv-series/seasons', $params);

        $response = json_decode($response);

        return $response;
    }
}
