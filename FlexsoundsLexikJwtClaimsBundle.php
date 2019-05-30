<?php

namespace Flexsounds\Bundle\FlexsoundsLexikJwtClaimsBundle;

use Flexsounds\Bundle\FlexsoundsLexikJwtClaimsBundle\DependencyInjection\Compiler\ClaimLoaderPass;
use Flexsounds\Bundle\FlexsoundsLexikJwtClaimsBundle\Jwt\ClaimInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class FlexsoundsLexikJwtClaimsBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        $container->registerForAutoconfiguration(ClaimInterface::class)
            ->addTag('flexsounds.lexik.claim')
        ;

        $container->addCompilerPass(new ClaimLoaderPass());
    }
}
