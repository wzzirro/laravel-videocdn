<?php

namespace Wzzirro\VideoCdn;

use Exception;
use Wzzirro\VideoCdn\Helpers\Formatter;
use Wzzirro\VideoCdn\Models\Animes;
use Wzzirro\VideoCdn\Models\animeTvSeries\AnimeTvSeries;
use Wzzirro\VideoCdn\Models\animeTvSeries\AnimeTvSeriesEpisodes;
use Wzzirro\VideoCdn\Models\animeTvSeries\AnimeTvSeriesSeasons;
use Wzzirro\VideoCdn\Models\ModelInterface;
use Wzzirro\VideoCdn\Models\Movies;
use Wzzirro\VideoCdn\Models\showTvSeries\ShowTvSeries;
use Wzzirro\VideoCdn\Models\showTvSeries\ShowTvSeriesEpisodes;
use Wzzirro\VideoCdn\Models\showTvSeries\ShowTvSeriesSeasons;
use Wzzirro\VideoCdn\Models\Translations;
use Wzzirro\VideoCdn\Models\tvSeries\TvSeries;
use Wzzirro\VideoCdn\Models\tvSeries\TvSeriesEpisodes;
use Wzzirro\VideoCdn\Models\tvSeries\TvSeriesSeasons;

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
    public $parameters;

    public function __construct(string $apiUrl, string $apiToken, string $defaultUserAgent)
    {
        $this->parameters['apiUrl']           = $apiUrl;
        $this->parameters['apiToken']         = $apiToken;
        $this->parameters['defaultUserAgent'] = $defaultUserAgent;
    }

    /**
     * @param $name
     *
     * @return ModelInterface
     * @throws Exception
     */
    public function __get($name)
    {
        $classname = '\\Wzzirro\VideoCdn\Models\\' . Formatter::camelCase($name);
        if (!class_exists($classname)) {
            throw new Exception('Model does not exists: ' . $name);
        }

        return new $classname($this->parameters);
    }
}