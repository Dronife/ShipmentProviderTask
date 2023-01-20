<?php
declare(strict_types=1);

namespace App\Service;

use App\Entity\Order as OrderEntity;
use App\Exception\OmnivaPickupFIndException;
use App\Factory\Request\Omniva\OmnivaFindRequestFactory;
use App\Factory\Request\Omniva\OmnivaRegisterRequestFactory;
use App\HttpClient\ProviderOmnivaClient;

class OmnivaService
{
    /**
     * @var ProviderOmnivaClient
     */
    private $providerOmnivaClient;

    public function __construct(ProviderOmnivaClient $providerOmnivaClient)
    {
        $this->providerOmnivaClient = $providerOmnivaClient;
    }

    /**
     * @throws OmnivaPickupFIndException
     */
    public function register(OrderEntity $orderEntity): void
    {
        $omnivaFindRequest = OmnivaFindRequestFactory::create($orderEntity);
        $omnivaResponse = $this->providerOmnivaClient->getProvider()->pickUpFind($omnivaFindRequest);
        if($omnivaResponse === null)
        {
            throw new OmnivaPickupFIndException();
        }

        $omnivaRegisterRequest = OmnivaRegisterRequestFactory::create($orderEntity, $omnivaResponse->getPickupPointId());
        $this->providerOmnivaClient->getProvider()->register($omnivaRegisterRequest);
    }
}
