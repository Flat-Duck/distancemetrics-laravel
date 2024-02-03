<?php

namespace FlatDuck\Distancemetrics;

use Illuminate\Database\Eloquent\Model;

class Distance extends Model
{
    public function km()
    {
        return $this->distance / 1000;
    }

    public function time()
    {
        return $this->duration / 60;
    }
}
