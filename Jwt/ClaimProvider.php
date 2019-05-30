<?php

namespace Flexsounds\Bundle\FlexsoundsLexikJwtClaimsBundle\Jwt;

class ClaimProvider
{
    /**
     * @var ClaimInterface[]
     */
    private $claims = [];

    public function addClaim(ClaimInterface $claim)
    {
        $this->claims[] = $claim;
    }

    public function getClaims()
    {
        return $this->claims;
    }
}
