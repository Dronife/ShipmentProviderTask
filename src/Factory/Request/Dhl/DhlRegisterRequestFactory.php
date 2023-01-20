<?php
declare(strict_types=1);

namespace App\Factory\Request\Dhl;

use App\Entity\Order;
use App\Model\Dhl\Request\DhlRegisterRequest;

class DhlRegisterRequestFactory
{
    public static function create(Order $order): DhlRegisterRequest
    {
        return (new DhlRegisterRequest())
            ->setCountry($order->getCountry())
            ->setAddress($order->getStreet())
            ->setOrderId($order->getId())
            ->setTown($order->getCity())
            ->setZipCode($order->getPostCode());
    }
}
