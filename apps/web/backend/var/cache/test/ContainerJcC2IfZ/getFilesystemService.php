<?php

namespace ContainerJcC2IfZ;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getFilesystemService extends GanianesCorp_Apps_Web_Backend_KernelTestDebugContainer
{
    /**
     * Gets the public 'filesystem' shared service.
     *
     * @return \Symfony\Component\Filesystem\Filesystem
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->services['filesystem'] = new \Symfony\Component\Filesystem\Filesystem();
    }
}
