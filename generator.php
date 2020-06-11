<?php

use Barryvdh\Reflection\DocBlock;
use Barryvdh\Reflection\DocBlock\Tag\MethodTag;

require_once __DIR__ . "/src/bootstrap.php";
require_once __DIR__ . "/vendor/autoload.php";

$classes = [
    \Illuminate\Support\Arr::class,
    \Illuminate\Support\Collection::class,
    \Illuminate\Support\Carbon::class,
];

$buildedMethods[] = "```php" . PHP_EOL;
foreach ($classes as $class) {
    /** @var MethodTag[]|object */
    $methods = (new DocBlock(
        $class = new ReflectionClass($class)
    ))->getTags();

    foreach ($methods as $method) {
        $paramDoc = implode("\n", array_map(function ($argumentSet) {
            return " * @param {$argumentSet[0]} {$argumentSet[1]}";
        }, $method->getArguments()));

        $arguments = implode(", ", array_map(function ($argumentSet) {
            return "{$argumentSet[1]}";
        }, $method->getArguments()));

        $returnType = implode("|", array_map(function ($type) {
            return $type;
        }, $method->getTypes()));

        $buildedMethods[] = (<<<HA
/**
 * {$method->getDescription()}
 *
{$paramDoc}
 * @return {$returnType}
 * /
{$class->getName()}::{$method->getMethodName()}($arguments)
HA.PHP_EOL.PHP_EOL
        );
    }
}

$buildedMethods[] = "```";

$result = implode(PHP_EOL, $buildedMethods);

$template = file_get_contents(__DIR__ . "/README.template.md");

file_put_contents(__DIR__ . "/README.md", str_replace("{{ METHODS_HERE }}", $result, $template));
