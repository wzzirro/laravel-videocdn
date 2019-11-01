<?php

namespace wzzirro\videocdn\models;

/**
 */
class Translations extends AbstractModel
{
    /**
     * @return mixed
     */
    public function list()
    {
        $response = $this->get('translations');

        $response = json_decode($response);

        return $response->data;
    }
}
