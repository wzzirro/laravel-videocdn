<?php


namespace wzzirro\videocdn\models\showTvSeries;


use wzzirro\videocdn\models\AbstractModel;

class ShowTvSeries extends AbstractModel
{
    /**
     * @see https://videocdn.tv/docs/show-tv-series
     *
     * @param array $params
     *
     * @return mixed
     */
    public function list(array $params = [])
    {
        $response = $this->get('show-tv-series', $params);

        $response = json_decode($response);

        return $response->data;
    }
}
