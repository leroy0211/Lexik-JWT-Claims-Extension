<?php
/**
 * Created by PhpStorm.
 * User: leroybaeyens
 * Date: 30-05-19
 * Time: 23:19.
 */

namespace Flexsounds\Bundle\FlexsoundsLexikJwtClaimsBundle\Tests\Jwt\Claim;

use Flexsounds\Bundle\FlexsoundsLexikJwtClaimsBundle\Jwt\Claim\IpAddressClaim;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class IpAddressClaimTest extends TestCase
{
    public function testGetName()
    {
        $claim = new IpAddressClaim($this->createMock(RequestStack::class));
        $this->assertSame('ip', $claim->getName());
    }

    public function testGetValue()
    {
        $request = new Request([], [], [], [], [], [
            'REMOTE_ADDR' => '1.2.3.4',
        ]);

        $requestStack = new RequestStack();
        $requestStack->push($request);
        $requestStack->push($request->duplicate([], [], [], [], [], [
            'REMOTE_ADDR' => '4.3.2.1',
        ]));

        $claim = new IpAddressClaim($requestStack);

        $this->assertSame('1.2.3.4', $claim->getValue());
    }
}
