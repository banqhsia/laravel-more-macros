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

    public function test_undot()
    {
        $givenArray = [
            'user.name' => 'ben',
            'user.age' => 20,
            'article.title' => 'this is title.',
            'created_at' => '2020-06-11',
        ];

        $expected = [
            'user' => [
                'name' => 'ben',
                'age' => 20,
            ],
            'article' => [
                'title' => 'this is title.',
            ],
            'created_at' => '2020-06-11',
        ];

        $this->assertEquals($expected, Arr::undot($givenArray));
    }
}
