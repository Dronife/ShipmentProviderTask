<?php
declare(strict_types=1);

namespace App\Tests\Unit\Factory;

use App\Constant\DataFormat;
use App\Factory\OrderFactory;
use App\Factory\SerializerFactory;
use PHPUnit\Framework\TestCase;

class SerializerFactoryTest extends TestCase
{
    /**
     * @test
     */
    public function serializerFactorySerializesInJson(): void
    {
        $id = 'id';
        $country = 'c';
        $city = 'c';
        $street = 's';
        $postCode = 'pc';
        $shippingProviderKey = 'spk';
        $expectedJson = json_encode([
            'shippingProviderKey' => $shippingProviderKey,
            'id' => $id,
            'street' => $street,
            'postCode' => $postCode,
            'city' => $city,
            'country' => $country,
        ]);
        $serializer = SerializerFactory::create();
        $order = OrderFactory::create($id, $country, $city, $street, $postCode, $shippingProviderKey);
        $serializedOrder = $serializer->serialize($order, DataFormat::JSON);

        $this->assertEquals($expectedJson, $serializedOrder);
    }
}
