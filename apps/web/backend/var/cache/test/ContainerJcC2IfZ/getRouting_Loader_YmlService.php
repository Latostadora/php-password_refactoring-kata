<?php

namespace ContainerJcC2IfZ;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getRouting_Loader_YmlService extends GanianesCorp_Apps_Web_Backend_KernelTestDebugContainer
{
    /**
     * Gets the private 'routing.loader.yml' shared service.
     *
     * @return \Symfony\Component\Routing\Loader\YamlFileLoader
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['routing.loader.yml'] = new \Symfony\Component\Routing\Loader\YamlFileLoader(($container->privates['file_locator'] ?? ($container->privates['file_locator'] = new \Symfony\Component\HttpKernel\Config\FileLocator(($container->services['kernel'] ?? $container->get('kernel', 1))))));
    }
}