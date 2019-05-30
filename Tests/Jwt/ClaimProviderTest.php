<?php
/**
 * Created by PhpStorm.
 * User: leroybaeyens
 * Date: 30-05-19
 * Time: 22:54.
 */

namespace Flexsounds\Bundle\FlexsoundsLexikJwtClaimsBundle\Tests\Jwt;

use Flexsounds\Bundle\FlexsoundsLexikJwtClaimsBundle\Jwt\ClaimInterface;
use Flexsounds\Bundle\FlexsoundsLexikJwtClaimsBundle\Jwt\ClaimProvider;
use PHPUnit\Framework\TestCase;

class ClaimProviderTest extends TestCase
{
    public function testAddingClaims()
    {
        $claimProvider = new ClaimProvider();
        $this->assertEmpty($claimProvider->getClaims());

        $claimProvider->addClaim($this->createMock(ClaimInterface::class));

        $this->assertCount(1, $claimProvider->getClaims());
    }
}
