<?php

namespace wzzirro\videocdn;

use Exception;
use Illuminate\Contracts\Config\Repository;
use wzzirro\videocdn\models\Animes;
use wzzirro\videocdn\models\animeTvSeries\AnimeTvSeries;
use wzzirro\videocdn\models\animeTvSeries\AnimeTvSeriesEpisodes;
use wzzirro\videocdn\models\animeTvSeries\AnimeTvSeriesSeasons;
use wzzirro\videocdn\models\ModelInterface;
use wzzirro\videocdn\models\Movies;
use wzzirro\videocdn\models\showTvSeries\ShowTvSeries;
use wzzirro\videocdn\models\showTvSeries\ShowTvSeriesEpisodes;
use wzzirro\videocdn\models\showTvSeries\ShowTvSeriesSeasons;
use wzzirro\videocdn\models\Translations;
use wzzirro\videocdn\models\tvSeries\TvSeries;
use wzzirro\videocdn\models\tvSeries\TvSeriesEpisodes;
use wzzirro\videocdn\models\tvSeries\TvSeriesSeasons;

/**
 * @package  VideoCDN
 * @author Philip Poteryaev <wzzirro@gmail.com>
 *
 * @property Translations          $translations
 * @property Movies                $movies
 * @property Animes                $animes
 *
 * @property TvSeries              $tvSeries
 * @property TvSeriesSeasons       $tvSeriesSeasons
 * @property TvSeriesEpisodes      $tvSeriesEpisodes
 *
 * @property ShowTvSeries          $showTvSeries
 * @property ShowTvSeriesSeasons   $showTvSeriesSeasons
 * @property ShowTvSeriesEpisodes  $showTvSeriesEpisodes
 *
 * @property AnimeTvSeries         $animeTvSeries
 * @property AnimeTvSeriesSeasons  $animeTvSeriesSeasons
 * @property AnimeTvSeriesEpisodes $animeTvSeriesEpisodes
 *
 */
class VideoCdn
{
    /** @var Repository */
    protected $config;
    /** @var Request */
    protected $request;

    public function getRequest()
    {
        if (!$this->request instanceof Request) {
            $this->request = new Request(
                $this->config->get('videocdn.apiUrl'),
                $this->config->get('videocdn.apiToken'),
                $this->config->get('videocdn.defaultUserAgent')
            );
        }
        return $this->request;
    }

    /**
     * @param $name
     *
     * @return ModelInterface
     * @throws Exception
     */
    public function __get($name)
    {
        return call_user_func_array([$this->getRequest(), '__get'], [$name]);
    }

    /**
     * @return Repository
     */
    public function getConfig(): Repository
    {
        return $this->config;
    }
}