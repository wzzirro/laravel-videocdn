<?php


namespace wzzirro\videocdn\models\animeTvSeries;


use wzzirro\videocdn\models\AbstractModel;

class AnimeTvSeriesSeasons extends AbstractModel
{
    /**
     * @see https://videocdn.tv/docs/anime-tv-series/seasons
     *
     * @param array $params
     *
     * @return mixed
     */
    public function list(array $params = [])
    {
        $response = $this->get('anime-tv-series/seasons', $params);

        $response = json_decode($response);

        return $response->data;
    }
}
