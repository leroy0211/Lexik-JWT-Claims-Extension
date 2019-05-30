<?php

namespace Flexsounds\Bundle\FlexsoundsLexikJwtClaimsBundle\Tests\EventListener;

use Flexsounds\Bundle\FlexsoundsLexikJwtClaimsBundle\EventListener\RegisterClaimsListener;
use Flexsounds\Bundle\FlexsoundsLexikJwtClaimsBundle\Jwt\ClaimProvider;
use Flexsounds\Bundle\FlexsoundsLexikJwtClaimsBundle\Tests\Fixtures\Claim\LoremClaim;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Security\Core\User\UserInterface;

class RegisterClaimsListenerTest extends TestCase
{
    /** @var JWTCreatedEvent */
    private $event;
    /** @var ClaimProvider */
    private $claimsProvider;
    /** @var RegisterClaimsListener */
    private $listener;

    protected function setUp()
    {
        $this->event = new JWTCreatedEvent([], $this->createMock(UserInterface::class), []);

        $this->claimsProvider = new ClaimProvider();

        $this->listener = new RegisterClaimsListener($this->claimsProvider);
    }

    public function testNoClaimsRegistered()
    {
        $this->listener->onJWTCreated($this->event);

        $this->assertSame([], $this->event->getData());
    }

    public function testSomeClaimsRegistered()
    {
        $this->claimsProvider->addClaim(new LoremClaim());
        $this->listener->onJWTCreated($this->event);

        $this->assertSame([
            'lorem' => 'ipsum',
        ], $this->event->getData());
    }
}
