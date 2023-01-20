<?php
declare(strict_types=1);

namespace App\Factory\Request\Omniva;

use App\Entity\Order;
use App\Model\Omniva\Request\OmnivaFindRequest;

class OmnivaFindRequestFactory
{
    public static function create(Order $order): OmnivaFindRequest
    {
        return (new OmnivaFindRequest())
            ->setCountry($order->getCountry())
            ->setPostCode($order->getPostCode());
    }
}
