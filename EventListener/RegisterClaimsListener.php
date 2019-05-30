<?php

namespace Flexsounds\Bundle\FlexsoundsLexikJwtClaimsBundle\EventListener;

use Flexsounds\Bundle\FlexsoundsLexikJwtClaimsBundle\Jwt\ClaimProvider;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;

class RegisterClaimsListener
{
    /**
     * @var ClaimProvider
     */
    private $claimProvider;

    /**
     * RegisterClaimsListener constructor.
     *
     * @param ClaimProvider $claimProvider
     */
    public function __construct(ClaimProvider $claimProvider)
    {
        $this->claimProvider = $claimProvider;
    }

    public function onJWTCreated(JWTCreatedEvent $event)
    {
        $payload = $event->getData();

        foreach ($this->claimProvider->getClaims() as $claim) {
            $payload[$claim->getName()] = $claim->getValue();
        }

        $event->setData($payload);
    }
}
