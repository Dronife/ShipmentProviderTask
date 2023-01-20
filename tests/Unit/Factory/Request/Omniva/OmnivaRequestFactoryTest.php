<?php
declare(strict_types=1);

namespace App\Tests\Unit\Factory\Request\Omniva;

use App\Factory\OrderFactory;
use App\Factory\Request\Dhl\DhlRegisterRequestFactory;
use App\Factory\Request\Omniva\OmnivaFindRequestFactory;
use App\Factory\Request\Omniva\OmnivaRegisterRequestFactory;
use PHPUnit\Framework\TestCase;

class OmnivaRequestFactoryTest extends TestCase
{
    /**
     * @test
     */
    public function OmnivaFindRequestFactoryCreatesOmnivaFindRequest(): void
    {
        $providerKey = 'omniva';
        $order = OrderFactory::createMocked($providerKey);
        $omnivaFindRequest = OmnivaFindRequestFactory::create($order);

        $this->assertEquals($omnivaFindRequest->getCountry(), $order->getCountry());
        $this->assertEquals($omnivaFindRequest->getPostCode(), $order->getPostCode());
    }

    /**
     * @test
     */
    public function OmnivaRegisterRequestFactoryCreatesOmnivaRegisterRequest(): void
    {
        $providerKey = 'omniva';
        $order = OrderFactory::createMocked($providerKey);
        $pickupPointId = 'pickup123';
        $omnivaFindRequest = OmnivaRegisterRequestFactory::create($order, $pickupPointId);

        $this->assertEquals($omnivaFindRequest->getPickupPointId(), $pickupPointId);
        $this->assertEquals($omnivaFindRequest->getOrderId(), $order->getId());
    }
}
