<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace HyperfHelper\Dependency\Annotation;

use Attribute;
use Hyperf\Di\Annotation\AbstractAnnotation;
use HyperfHelper\Dependency\Annotation\Collector\DependencyCollector;
use ReflectionException;

#[Attribute(Attribute::TARGET_CLASS)]
class Dependency extends AbstractAnnotation
{
    /**
     * @param string<class-string> $identifier 接口类
     * @param int $priority 权重
     */
    public function __construct(public string $identifier = '', protected int $priority = 1)
    {
    }

    /**
     * @throws ReflectionException
     */
    public function collectClass(string $className): void
    {
        DependencyCollector::collectorDependency($className, $this->identifier, $this->priority);
    }
}
