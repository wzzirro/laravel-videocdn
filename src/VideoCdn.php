<?php

namespace Wzzirro\VideoCdn;

use Exception;
use Illuminate\Contracts\Config\Repository;
use Wzzirro\VideoCdn\models\Animes;
use Wzzirro\VideoCdn\models\animeTvSeries\AnimeTvSeries;
use Wzzirro\VideoCdn\models\animeTvSeries\AnimeTvSeriesEpisodes;
use Wzzirro\VideoCdn\models\animeTvSeries\AnimeTvSeriesSeasons;
use Wzzirro\VideoCdn\models\ModelInterface;
use Wzzirro\VideoCdn\models\Movies;
use Wzzirro\VideoCdn\models\showTvSeries\ShowTvSeries;
use Wzzirro\VideoCdn\models\showTvSeries\ShowTvSeriesEpisodes;
use Wzzirro\VideoCdn\models\showTvSeries\ShowTvSeriesSeasons;
use Wzzirro\VideoCdn\models\Translations;
use Wzzirro\VideoCdn\models\tvSeries\TvSeries;
use Wzzirro\VideoCdn\models\tvSeries\TvSeriesEpisodes;
use Wzzirro\VideoCdn\models\tvSeries\TvSeriesSeasons;

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

    public function __construct(Repository $config)
    {
        $this->config = $config;
    }

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
        return call_user_func_array([$this->getRequest(), 'get'], [$name]);
    }

    /**
     * @return Repository
     */
    public function getConfig(): Repository
    {
        return $this->config;
    }
}