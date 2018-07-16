<?php declare(strict_types=1);

namespace WyriHaximus\Tests;

use ApiClients\Tools\TestUtilities\TestCase;
use function WyriHaximus\toXOrNotToX;

final class ToXOrNotToXTest extends TestCase
{
    public function provideTestsAndExpectedResults(): iterable
    {
        yield [
            ToXMethod::class . '::method',
            true,
        ];

        yield [
            ToNotXMethod::class . '::method',
            false,
        ];
    }

    /**
     * @dataProvider provideTestsAndExpectedResults
     */
    public function tests(string $callable, bool $expectedResult)
    {
        self::assertSame($expectedResult, toXOrNotToX(Annot::class, $callable));
    }
}
