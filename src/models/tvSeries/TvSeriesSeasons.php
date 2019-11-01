<?php


namespace wzzirro\videocdn\models\tvSeries;


use wzzirro\videocdn\models\AbstractModel;

class TvSeriesSeasons extends AbstractModel
{
    /**
     * @see https://videocdn.tv/docs/tv-series/seasons
     *
     * @param array $params
     *
     * @return mixed
     */
    public function list(array $params = [])
    {
        $response = $this->get('tv-series/seasons', $params);

        $response = json_decode($response);

        return $response->data;
    }
}
