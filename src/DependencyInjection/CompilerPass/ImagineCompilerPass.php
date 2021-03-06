<?php

declare(strict_types=1);

namespace Silverback\ApiComponentBundle\DependencyInjection\CompilerPass;

use Silverback\ApiComponentBundle\File\Uploader\FileUploader;
use Silverback\ApiComponentBundle\Imagine\PathResolver;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class ImagineCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        $rootPaths = $container->getDefinition('liip_imagine.binary.loader.default')->getArgument(2)->getArgument(0);

        $container->getDefinition(PathResolver::class)
            ->setArgument(0, $rootPaths);
        $container->getDefinition(FileUploader::class)
            ->setArgument(4, $rootPaths);
    }
}
