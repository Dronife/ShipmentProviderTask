<?php
declare(strict_types=1);

namespace App\Factory;

use App\Entity\Order;

class OrderFactory
{
    public static function create(
        string $id,
        string $country,
        string $city,
        string $street,
        string $postCode,
        string $shippingProviderKey
    ): Order {
        return (new Order())
            ->setId($id)
            ->setCountry($country)
            ->setCity($city)
            ->setPostCode($postCode)
            ->setStreet($street)
            ->setShippingProviderKey($shippingProviderKey);
    }

    public static function createMocked(string $shippingProviderKey): Order
    {
        return self::create(
            "123",
            "Lithuania",
            "Vilnius",
            "Gedimino pr 24",
            "09123",
            $shippingProviderKey
        );
    }
}
