<?php
declare(strict_types=1);

namespace App\Tests\Unit\Factory;

use App\Factory\OrderFactory;
use PHPUnit\Framework\TestCase;

class OrderFactoryTest extends TestCase
{
    /**
     * @test
     */
    public function createMockedWillReturnOrderWithParameters(): void
    {
        $shippingProvider = 'omniva';
        $order = OrderFactory::createMocked($shippingProvider);

        $this->assertNotNull($order->getShippingProviderKey());
        $this->assertNotNull($order->getId());
        $this->assertNotNull($order->getCountry());
        $this->assertNotNull($order->getCity());
        $this->assertNotNull($order->getPostCode());
        $this->assertNotNull($order->getStreet());
    }

    /**
     * @test
     */
    public function factoryWillReturnOrderWithProvidedParameters(): void
    {
        $shippingProvider = 'omniva';
        $id = 'jd9n238';
        $country = 'USA';
        $city = 'New York';
        $postCode = 'usa123';
        $street = 'Dublin 321 st.';
        $order = OrderFactory::create($id, $country, $city, $street, $postCode, $shippingProvider);

        $this->assertNotNull($order);
        $this->assertEquals($id, $order->getId());
        $this->assertEquals($country, $order->getCountry());
        $this->assertEquals($city, $order->getCity());
        $this->assertEquals($postCode, $order->getPostCode());
        $this->assertEquals($street, $order->getStreet());
    }
}
