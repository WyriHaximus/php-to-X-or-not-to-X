<?php declare(strict_types=1);

namespace WyriHaximus\Tests;

use WyriHaximus\Annotations\ChildProcess;

final class ToChildProcessMethod
{
    /**
     * @ChildProcess()
     */
    public function method()
    {
    }
}
