<?php

use \Illuminate\Support\Arr;

Arr::macro('absent', function ($array, $keys) {
    return ! static::has($array, $keys);
});
