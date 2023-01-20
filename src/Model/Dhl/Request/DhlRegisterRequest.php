<?php
declare(strict_types=1);

namespace App\Model\Dhl\Request;

use App\Model\RequestInterface;
use Symfony\Component\Serializer\Annotation\SerializedName;

class DhlRegisterRequest implements RequestInterface
{
    /**
     * @var string $orderId
     *
     * @SerializedName("order_id")
     */
    private $orderId;

    /**
     * @var string $country
     */
    private $country;

    /**
     * @var string $address
     */
    private $address;

    /**
     * @var string $town
     */
    private $town;

    /**
     * @var string $zipCode
     *
     * @SerializedName("zip_code")
     */
    private $zipCode;

    public function getOrderId(): string
    {
        return $this->orderId;
    }

    public function setOrderId(string $orderId): self
    {
        $this->orderId = $orderId;

        return $this;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getTown(): string
    {
        return $this->town;
    }

    public function setTown(string $town): self
    {
        $this->town = $town;

        return $this;
    }

    public function getZipCode(): string
    {
        return $this->zipCode;
    }

    public function setZipCode(string $zipCode): self
    {
        $this->zipCode = $zipCode;

        return $this;
    }
}
