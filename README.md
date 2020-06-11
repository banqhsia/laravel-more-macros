# Laravel-more-macros

Provides more macros for illuminate/support or Laravel Macroble classes.

## Prerequisites
* [illuminate/support](https://github.com/illuminate/support) installed

## Installation
   ```bash
   composer require benyi/laravel-more-macros
   ```

## Methods
> See [`bootstrap.php`](https://github.com/banqhsia/laravel-more-macros/blob/master/src/bootstrap.php) file listing.

```
/**
 * Check if an item is not exists in an array using "dot" notation.
 *
 * @param \ArrayAccess|array $array
 * @param string $key
 * @return array
 */
Illuminate\Support\Arr::absent($array, $key)


/**
 * "Un-dot" the flattened array into multi-dimensional structure.
 *
 * @param array $array
 * @return array
 */
Illuminate\Support\Arr::undot($array)


/**
 * Diff the collection with the given items (case insensitive)
 *
 * @param mixed $items
 * @return $this
 */
Illuminate\Support\Collection::diffCi($items)


/**
 * Determines if the given string is a valid DateTime format.
 *
 * @param string|null $time
 * @param \DateTimeZone|string|null $tz
 * @return bool
 */
Illuminate\Support\Carbon::recognized($time, $tz)


/**
 * Determines if the given string is not a valid DateTime format.
 *
 * @param string|null $time
 * @param \DateTimeZone|string|null $tz
 * @return bool
 */
Illuminate\Support\Carbon::unrecognized($time, $tz)


```
