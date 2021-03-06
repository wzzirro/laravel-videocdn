<?php

namespace Wzzirro\VideoCdn;

use Exception;
use Illuminate\Contracts\Config\Repository;
use Wzzirro\VideoCdn\models\Animes;
use Wzzirro\VideoCdn\models\AnimeTvSeries;
use Wzzirro\VideoCdn\models\AnimeTvSeriesEpisodes;
use Wzzirro\VideoCdn\models\AnimeTvSeriesSeasons;
use Wzzirro\VideoCdn\models\ModelInterface;
use Wzzirro\VideoCdn\models\Movies;
use Wzzirro\VideoCdn\models\Translations;
use Wzzirro\VideoCdn\models\TvSeries;
use Wzzirro\VideoCdn\models\TvSeriesEpisodes;
use Wzzirro\VideoCdn\models\TvSeriesSeasons;

/**
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
 * @property AnimeTvSeries         $animeTvSeries
 * @property AnimeTvSeriesSeasons  $animeTvSeriesSeasons
 * @property AnimeTvSeriesEpisodes $animeTvSeriesEpisodes
 *
 */
class VideoCdnManager
{
    /** @var Repository */
    protected $config;
    /** @var VideoCdn */
    protected $videoCdn;

    public function __construct(Repository $config)
    {
        $this->config = $config;
    }

    public function getVideoCdn()
    {
        if (!$this->videoCdn instanceof VideoCdn) {
            $this->videoCdn = new VideoCdn(
                $this->config->get('videocdn.apiUrl'),
                $this->config->get('videocdn.apiToken'),
                $this->config->get('videocdn.defaultUserAgent')
            );
        }
        return $this->videoCdn;
    }

    /**
     * @param $name
     *
     * @return ModelInterface
     * @throws Exception
     */
    public function __get($name)
    {
        return call_user_func_array([$this->getVideoCdn(), '__get'], [$name]);
    }

    /**
     * @return Repository
     */
    public function getConfig(): Repository
    {
        return $this->config;
    }
}