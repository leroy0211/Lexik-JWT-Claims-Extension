<?php

namespace Flexsounds\Bundle\FlexsoundsLexikJwtClaimsBundle\DependencyInjection\Compiler;

use Flexsounds\Bundle\FlexsoundsLexikJwtClaimsBundle\Jwt\ClaimProvider;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class ClaimLoaderPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition(ClaimProvider::class)) {
            return;
        }

        $claimProvider = $container->getDefinition(ClaimProvider::class);

        $services = $container->findTaggedServiceIds('flexsounds.lexik.claim');

        foreach ($services as $id => $tags) {
            $claimProvider->addMethodCall('addClaim', [new Reference($id)]);
        }
    }
}
