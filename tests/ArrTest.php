<?php

use Illuminate\Support\Arr;
use PHPUnit\Framework\TestCase;

class ArrTest extends TestCase
{
    public function test_absent()
    {
        $givenArray = [
            'name' => 'ben',
            'age' => 20,
        ];

        $this->assertFalse(Arr::absent($givenArray, 'name'));
        $this->assertTrue(Arr::absent($givenArray, 'address'));
    }
}
