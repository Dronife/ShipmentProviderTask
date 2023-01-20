<?php
declare(strict_types=1);

namespace App\Tests\Unit\HttpClient;

use App\Factory\OrderFactory;
use App\Factory\Request\Omniva\OmnivaFindRequestFactory;
use App\Factory\Request\Omniva\OmnivaRegisterRequestFactory;
use App\HttpClient\ProviderOmnivaClient;
use App\ProviderApi\AbstractApi;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ProviderOmnivaClientTest extends KernelTestCase
{
    /**
     * @var ProviderOmnivaClient $providerOmnivaClient
     */
    private $providerOmnivaClient;

    protected function setUp(): void
    {
        self::bootKernel();
        $this->providerOmnivaClient = self::$container->get(ProviderOmnivaClient::class);
    }

    /**
     * @test
     */
    public function providerMethodReturnAbstractApiClass(): void
    {
        $this->assertInstanceOf(AbstractApi::class, $this->providerOmnivaClient->getProvider());
    }

    /**
     * @test
     */
    public function findMethodWillRespondWithPickupPointId(): void
    {
        $shipmentProviderKey = 'omniva';
        $order = OrderFactory::createMocked($shipmentProviderKey);
        $omnivaFindRequest = OmnivaFindRequestFactory::create($order);
        $pickupPointId = $this->providerOmnivaClient->getProvider()->pickUpFind($omnivaFindRequest);

        $this->assertNotNull($pickupPointId);
    }

    /**
     * @test
     */
    public function registerMethodWillNotGiveAnError(): void
    {
        $shipmentProviderKey = 'omniva';
        $order = OrderFactory::createMocked($shipmentProviderKey);
        $pickupPointId = 'ndu9823d20';
        $omnivaRegisterRequest = OmnivaRegisterRequestFactory::create($order, $pickupPointId);

        $this->assertNull($this->providerOmnivaClient->getProvider()->register($omnivaRegisterRequest));
    }
}
