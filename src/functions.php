<?php declare(strict_types=1);

namespace WyriHaximus;

use Cake\Collection\Collection;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\Reader;

function toXOrNotToX(string $annotation, string $callable, Reader $annotationReader = null, bool $checkClass = true): bool
{
    if (!($annotationReader instanceof Reader)) {
        $annotationReader = new AnnotationReader();
    }

    list($class, $method) = explode('::', $callable);

    $annotations = (new  Collection($annotationReader->getMethodAnnotations((new \ReflectionClass($class))->getMethod($method))))
        ->indexBy(function (object $annotation) {
            return get_class($annotation);
        })->toArray();

    if (isset($annotations[$annotation])) {
        return true;
    }

    if ($checkClass === false) {
        return false;
    }

    $annotations = (new  Collection($annotationReader->getClassAnnotations(new \ReflectionClass($class))))
        ->indexBy(function (object $annotation) {
            return get_class($annotation);
        })->toArray();

    if (isset($annotations[$annotation])) {
        return true;
    }

    return false;
}
