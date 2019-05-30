<?php

namespace Flexsounds\Bundle\FlexsoundsLexikJwtClaimsBundle\Tests\Fixtures\Claim;

use Flexsounds\Bundle\FlexsoundsLexikJwtClaimsBundle\Jwt\ClaimInterface;

class LoremClaim implements ClaimInterface
{
    public function getName()
    {
        return 'lorem';
    }

    public function getValue()
    {
        return 'ipsum';
    }
}
