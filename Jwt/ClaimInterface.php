<?php

namespace Flexsounds\Bundle\FlexsoundsLexikJwtClaimsBundle\Jwt;

interface ClaimInterface
{
    public function getName();

    public function getValue();
}
