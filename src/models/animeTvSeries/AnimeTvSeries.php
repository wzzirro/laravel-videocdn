<?php


namespace Wzzirro\VideoCdn\Models\animeTvSeries;


use Wzzirro\VideoCdn\Models\AbstractModel;

class AnimeTvSeries extends AbstractModel
{
    /**
     * @see https://videocdn.tv/docs/anime-tv-series
     *
     * @param array $params
     *
     * @return mixed
     */
    public function call(array $params = [])
    {
        $response = $this->get('anime-tv-series', $params);

        $response = json_decode($response);

        return $response;
    }
}
