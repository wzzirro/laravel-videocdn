<?php


namespace Wzzirro\VideoCdn\Models\showTvSeries;


use Wzzirro\VideoCdn\Models\AbstractModel;

class ShowTvSeriesSeasons extends AbstractModel
{
    /**
     * @see https://videocdn.tv/docs/show-tv-series/seasons
     *
     * @param array $params
     *
     * @return mixed
     */
    public function call(array $params = [])
    {
        $response = $this->get('show-tv-series/seasons', $params);

        $response = json_decode($response);

        return $response;
    }
}
