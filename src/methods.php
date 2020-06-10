<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

if (! class_exists(\Illuminate\Support\LaravelMoreMacrosIdeHelperLoaded::class)) {
    if (class_exists(\Illuminate\Support\Arr::class)) {
        Arr::macro('absent', function ($array, $keys) {
            return ! static::has($array, $keys);
        });
    }

    if (class_exists(\Illuminate\Support\Carbon::class)) {
        Carbon::macro('recognized', function ($time = null, $tz = null) {
            return (bool) @static::parse($time, $tz);
        });

        Carbon::macro('unrecognized', function ($time = null, $tz = null) {
            return ! static::recognized(...func_get_args());
        });
    }

    if (class_exists(\Illuminate\Support\Collection::class)) {
        Collection::macro('diffCi', function ($diffBy) {
            return $this->diffUsing($diffBy, 'strcasecmp');
        });
    }
}
