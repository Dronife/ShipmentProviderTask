<?php
declare(strict_types=1);

namespace App\Factory\Request\Omniva;

use App\Entity\Order;
use App\Model\Omniva\Request\OmnivaRegisterRequest;

class OmnivaRegisterRequestFactory
{
    public static function create(Order $order, string $pickupPointId): OmnivaRegisterRequest
    {
        return (new OmnivaRegisterRequest())
            ->setPickupPointId($pickupPointId)
            ->setOrderId($order->getId());
    }
}
