<?php

namespace ContainerJ8Oc1Pi;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCacheWarmerService extends GanianesCorp_Apps_Web_Backend_KernelTestDebugContainer
{
    /**
     * Gets the public 'cache_warmer' shared service.
     *
     * @return \Symfony\Component\HttpKernel\CacheWarmer\CacheWarmerAggregate
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->services['cache_warmer'] = new \Symfony\Component\HttpKernel\CacheWarmer\CacheWarmerAggregate(new RewindableGenerator(function () use ($container) {
            yield 0 => ($container->privates['router.cache_warmer'] ?? $container->load('getRouter_CacheWarmerService'));
        }, 1), true, ($container->targetDir.''.'/GanianesCorp_Apps_Web_Backend_KernelTestDebugContainerDeprecations.log'));
    }
}
