<?php
declare(strict_types=1);

namespace App\Tests\Unit\Factory\Request\Dhl;

use App\Factory\OrderFactory;
use App\Factory\Request\Dhl\DhlRegisterRequestFactory;
use PHPUnit\Framework\TestCase;

class DhlClientRequestFactoryTest extends TestCase
{
    /**
     * @test
     */
    public function DhlClientRequestFactoryCreatesDhlRequestModel(): void
    {
        $providerKey = 'asd';
        $order = OrderFactory::createMocked($providerKey);
        $dhlRequest = DhlRegisterRequestFactory::create($order);

        $this->assertEquals($order->getPostCode(), $dhlRequest->getZipCode());
        $this->assertEquals($order->getId(), $dhlRequest->getOrderId());
        $this->assertEquals($order->getCountry(), $dhlRequest->getCountry());
        $this->assertEquals($order->getStreet(), $dhlRequest->getAddress());
        $this->assertEquals($order->getCity(), $dhlRequest->getTown());
    }
}
