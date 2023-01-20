<?php
declare(strict_types=1);

namespace App\Service;

use App\Constant\ShippingProvider;
use App\Entity\Order as OrderEntity;
use App\Exception\ProviderKeyNotFoundException;
use App\Factory\Request\Dhl\DhlRegisterRequestFactory;
use App\HttpClient\ProviderDhlClient;
use Exception;

class Order
{
    /**
     * @var ProviderDhlClient
     */
    private $providerDHLClient;

    /**
     * @var OmnivaService
     */
    private $omnivaService;

    public function __construct(ProviderDhlClient $providerDHLClient, OmnivaService $omnivaService)
    {
        $this->providerDHLClient = $providerDHLClient;
        $this->omnivaService = $omnivaService;
    }

    /**
     * @throws Exception
     */
    public function registerShipping(OrderEntity $order): void
    {
        $providerKey = $order->getShippingProviderKey();
        switch ($providerKey) {
            case ShippingProvider::SHIPPING_PROVIDER_DHL:
                $this->providerDHLClient->getProvider()->register(DhlRegisterRequestFactory::create($order));
                break;
            case ShippingProvider::SHIPPING_PROVIDER_OMNIVA:
                $this->omnivaService->register($order);
                break;
            case ShippingProvider::SHIPPING_PROVIDER_UPS:
                throw new Exception(
                    ShippingProvider::SHIPPING_PROVIDER_UPS.': No implementation for this provider'
                );
            default:
                throw new ProviderKeyNotFoundException($providerKey);
        }

        print("Operation is done.\n");
    }
}
