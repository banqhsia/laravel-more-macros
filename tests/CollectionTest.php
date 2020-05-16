<?php

use PHPUnit\Framework\TestCase;
use Illuminate\Support\Collection;

class CollectionTest extends TestCase
{
    public function test_diffCi()
    {
        $target = new Collection(['john', 'paul', 'ben', 'peter']);

        $expected = ['john', 'paul'];
        $actual = $target->diffCi(['BEN', 'Peter'])->all();

        $this->assertEquals($expected, $actual);
    }
}
