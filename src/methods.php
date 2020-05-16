<?php

use \Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

Arr::macro('absent', function ($array, $keys) {
    return ! static::has($array, $keys);
});

Carbon::macro('recognized', function ($time = null, $tz = null) {
    return (bool) @static::parse($time, $tz);
});

Carbon::macro('unrecognized', function ($time = null, $tz = null) {
    return ! static::recognized(...func_get_args());
});

Collection::macro('diffCi', function ($diffBy) {
    return $this->diffUsing($diffBy, 'strcasecmp');
});