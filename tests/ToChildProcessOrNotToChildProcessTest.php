<?php declare(strict_types=1);

namespace WyriHaximus\Tests;

use ApiClients\Tools\TestUtilities\TestCase;
use function WyriHaximus\toChildProcessOrNotToChildProcess;

final class ToChildProcessOrNotToChildProcessTest extends TestCase
{
    public function provideTestsAndExpectedResults(): iterable
    {
        yield [
            ToChildProcessMethod::class . '::method',
            true,
        ];

        yield [
            ToNotChildProcessMethod::class . '::method',
            false,
        ];
    }

    /**
     * @dataProvider provideTestsAndExpectedResults
     */
    public function tests(string $callable, bool $expectedResult)
    {
        self::assertSame($expectedResult, toChildProcessOrNotToChildProcess($callable));
    }
}
