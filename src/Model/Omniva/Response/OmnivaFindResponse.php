<?php
declare(strict_types=1);

namespace App\Model\Omniva\Response;

use App\Model\ResponseInterface;
use Symfony\Component\Serializer\Annotation\SerializedName;

class OmnivaFindResponse implements ResponseInterface
{
    /**
     * @var string $pickupPointId
     *
     * @SerializedName("pickup_point_id")
     */
    private $pickupPointId;

    public function getPickupPointId(): string
    {
        return $this->pickupPointId;
    }

    public function setPickupPointId(string $pickupPointId): self
    {
        $this->pickupPointId = $pickupPointId;

        return $this;
    }
}
