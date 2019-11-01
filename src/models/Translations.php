<?php

namespace Wzzirro\VideoCdn\Models;

class Translations extends AbstractModel
{
    /**
     * @see https://videocdn.tv/docs/translations
     *
     * @return mixed
     */
    public function list()
    {
        $response = $this->get('translations');

        $response = json_decode($response);

        return $response->data;
    }
}
