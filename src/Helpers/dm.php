<?php

use FlatDuck\Distancemetrics\Distancemetrics;

if(!function_exists('dm')) {
    function dm() {
        return app(Distancemetrics::class);
    }
}