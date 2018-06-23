<?php

use React\EventLoop\Factory;
use React\EventLoop\Timer\TimerInterface;
use WyriHaximus\React\Inspector\InfoProvider;
use WyriHaximus\React\Inspector\LoopDecorator;

require 'vendor/autoload.php';

$loop = new LoopDecorator(Factory::create());
$info = new InfoProvider($loop);

for ($i = 1; $i <= 3; $i++) {
    $loop->addTimer($i, function () {});
    $loop->addPeriodicTimer(0.00001, function (TimerInterface $timer) use ($loop) {
        if (mt_rand(0, 10000) == mt_rand(0, 10000)) {
            $loop->cancelTimer($timer);
        }
    });
    $loop->nextTick(function () use ($loop) {
        $loop->nextTick(function () {});
    });
    $loop->futureTick(function () use ($loop) {
        $loop->futureTick(function () {});
    });
}

$loop->run();

var_export($info->getCounters());
