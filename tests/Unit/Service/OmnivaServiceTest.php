<?php
declare(strict_types=1);

namespace App\Tests\Unit\Service;

use App\Factory\OrderFactory;
use App\HttpClient\ProviderOmnivaClient;
use App\Service\OmnivaService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class OmnivaServiceTest extends KernelTestCase
{
    /**
     * @var ProviderOmnivaClient $omnivaService
     */
    private $omnivaService;

    protected function setUp(): void
    {
        self::bootKernel();
        $this->omnivaService = self::$container->get(OmnivaService::class);
    }

    /**
     * @test
     */
    public function omnivaServiceWillNotGiveAnError(): void
    {
        $shipmentProviderKey = 'dhl';
        $order = OrderFactory::createMocked($shipmentProviderKey);
        $this->omnivaService->register($order);

        $this->addToAssertionCount(1);
    }
}
