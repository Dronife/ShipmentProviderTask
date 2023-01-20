<?php

declare(strict_types=1);

namespace App\Tests\Unit\Entity;

use App\Entity\Order;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    /**
     * @test
     */
    public function shouldHaveUpsAsDefaultShipping(): void
    {
        $order = new Order();

        $this->assertEquals('ups', $order->getShippingProviderKey());
    }

    /**
     * @test
     */
    public function canSetShippingProvider(): void
    {
        $shippingProvider = 'omniva';
        $order = (new Order())->setShippingProviderKey($shippingProvider);

        $this->assertEquals($shippingProvider, $order->getShippingProviderKey());
    }
}
