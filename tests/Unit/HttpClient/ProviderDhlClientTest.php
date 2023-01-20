<?php
declare(strict_types=1);

namespace App\Tests\Unit\HttpClient;

use App\Factory\OrderFactory;
use App\Factory\Request\Dhl\DhlRegisterRequestFactory;
use App\HttpClient\ProviderDhlClient;
use App\ProviderApi\AbstractApi;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ProviderDhlClientTest extends KernelTestCase
{
    /**
     * @var ProviderDhlClient $providerDhlClient
     */
    private $providerDhlClient;

    protected function setUp(): void
    {
        self::bootKernel();
        $this->providerDhlClient = self::$container->get(ProviderDhlClient::class);
    }

    /**
     * @test
     */
    public function providerMethodReturnAbstractApiClass(): void
    {
        $this->assertInstanceOf(AbstractApi::class, $this->providerDhlClient->getProvider());
    }

    /**
     * @test
     */
    public function registerMethodWillNotGiveError(): void
    {
        $shipmentProviderKey = 'omniva';
        $order = OrderFactory::createMocked($shipmentProviderKey);
        $dhlRequest = DhlRegisterRequestFactory::create($order);

        $this->assertNull($this->providerDhlClient->getProvider()->register($dhlRequest));
    }
}
