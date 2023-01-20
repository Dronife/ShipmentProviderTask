<?php
declare(strict_types=1);

namespace App\Model\Omniva\Request;

use App\Model\RequestInterface;
use Symfony\Component\Serializer\Annotation\SerializedName;

class OmnivaRegisterRequest implements RequestInterface
{
    /**
     * @var string $pickupPointId
     *
     * @SerializedName("pickup_point_id")
     */
    private $pickupPointId;

    /**
     * @var string $orderId
     *
     * @SerializedName("order_id")
     */
    private $orderId;

    public function getPickupPointId(): string
    {
        return $this->pickupPointId;
    }

    public function setPickupPointId(string $pickupPointId): self
    {
        $this->pickupPointId = $pickupPointId;

        return $this;
    }

    public function getOrderId(): string
    {
        return $this->orderId;
    }

    public function setOrderId(string $orderId): self
    {
        $this->orderId = $orderId;

        return $this;
    }
}
