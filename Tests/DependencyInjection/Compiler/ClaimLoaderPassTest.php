<?php

namespace Flexsounds\Bundle\FlexsoundsLexikJwtClaimsBundle\Tests\DependencyInjection\Compiler;

use Flexsounds\Bundle\FlexsoundsLexikJwtClaimsBundle\DependencyInjection\Compiler\ClaimLoaderPass;
use Flexsounds\Bundle\FlexsoundsLexikJwtClaimsBundle\Jwt\ClaimInterface;
use Flexsounds\Bundle\FlexsoundsLexikJwtClaimsBundle\Jwt\ClaimProvider;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class ClaimLoaderPassTest extends TestCase
{
    public function testAddingTaggedClaims()
    {
        $container = new ContainerBuilder();
        $container->register(ClaimProvider::class, new ClaimProvider());

        $container->register('claim.dummy', $this->createMock(ClaimInterface::class))->addTag('flexsounds.lexik.claim');

        $this->process($container);

        $this->assertTrue($container->has(ClaimProvider::class));
        $this->assertTrue($container->has('claim.dummy'));

        $claimProvider = $container->get(ClaimProvider::class);

        $this->assertCount(1, $claimProvider->getClaims());
    }

    private function process(ContainerBuilder $container)
    {
        (new ClaimLoaderPass())->process($container);
    }
}
