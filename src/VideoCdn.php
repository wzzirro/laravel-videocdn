<?php

namespace wzzirro\videocdn;

use Exception;
use wzzirro\videocdn\helpers\Formatter;
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
    private $parameters;

    /**
     * @param $name
     *
     * @return ModelInterface
     * @throws Exception
     */
    public function __get($name)
    {
        $className = '\\wzzirro\\videocdn\\models\\' . Formatter::camelCase($name);

        if (!class_exists($className)) {
            throw new Exception("Model does not exists: {$className}");
        }

        return new $className($this->parameters);
    }
}