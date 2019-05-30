<?php

namespace Flexsounds\Bundle\FlexsoundsLexikJwtClaimsBundle\Jwt\Claim;

use Flexsounds\Bundle\FlexsoundsLexikJwtClaimsBundle\Jwt\ClaimInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class IpAddressClaim implements ClaimInterface
{
    private $requestStack;

    /**
     * IpAddressClaim constructor.
     *
     * @param $requestStack
     */
    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    public function getName()
    {
        return 'ip';
    }

    public function getValue()
    {
        $request = $this->requestStack->getMasterRequest();

        return $request->getClientIp();
    }
}
