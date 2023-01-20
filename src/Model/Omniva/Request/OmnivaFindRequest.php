<?php
declare(strict_types=1);

namespace App\Model\Omniva\Request;

use App\Model\RequestInterface;
use Symfony\Component\Serializer\Annotation\SerializedName;

class OmnivaFindRequest implements RequestInterface
{
    /**
     * @var string $country
     */
    private $country;

    /**
     * @var string $postCode
     *
     * @SerializedName("post_code")
     */
    private $postCode;

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getPostCode(): string
    {
        return $this->postCode;
    }

    public function setPostCode(string $postCode): self
    {
        $this->postCode = $postCode;

        return $this;
    }
}
