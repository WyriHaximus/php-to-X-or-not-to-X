<?php declare(strict_types=1);

namespace WyriHaximus\Tests;

use ApiClients\Tools\TestUtilities\TestCase;
use function WyriHaximus\toXOrNotToX;

/**
 * @internal
 */
final class ToXOrNotToXTest extends TestCase
{
    public function provideTestsAndExpectedResults(): iterable
    {
        yield [
            ToXMethod::class . '::method',
            true,
            true,
        ];

        yield [
            ToXClass::class . '::method',
            true,
            true,
        ];

        yield [
            ToXClass::class . '::method',
            false,
            false,
        ];

        yield [
            ToNotXMethod::class . '::method',
            false,
            true,
        ];
    }

    /**
     * @dataProvider provideTestsAndExpectedResults
     */
    public function tests(string $callable, bool $expectedResult, bool $checkClass): void
    {
        self::assertSame($expectedResult, toXOrNotToX(Annot::class, $callable, null, $checkClass));
    }
}
