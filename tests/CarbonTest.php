<?php

use Illuminate\Support\Carbon;
use PHPUnit\Framework\TestCase;

class CarbonTest extends TestCase
{
    /**
     * @dataProvider dateTimeProvider
     */
    public function test_recognized($dateTime, $expected)
    {
        $this->assertEquals($expected, Carbon::recognized($dateTime));
    }

    /**
     * @dataProvider dateTimeProvider
     */
    public function test_unrecognized($dateTime, $expected)
    {
        $this->assertEquals(! $expected, Carbon::unrecognized($dateTime));
    }

    public function dateTimeProvider()
    {
        return [
            ['2020-02-10', true],
            ['2020-2-10', true],
            ['2020-02-10 10:30:35', true],
            ['@1589124645', true],
            ['some_string', false],
            [new \DateTime('2020-02-10'), true],
            [new \DateTimeImmutable('2020-02-10'), true],
        ];
    }
}
