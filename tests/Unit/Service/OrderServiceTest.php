<?php
declare(strict_types=1);

namespace App\Tests\Unit\Service;

use App\Exception\ProviderKeyNotFoundException;
use App\Factory\OrderFactory;
use App\Service\Order as OrderService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class OrderServiceTest extends KernelTestCase
{
    protected function setUp(): void
    {
        self::bootKernel();
        $this->orderService = self::$container->get(OrderService::class);
    }

    /**
     * @test
     */
    public function unknownProviderKey(): void
    {
        $shippingProvider = 'omniva123s';
        $order = OrderFactory::createMocked($shippingProvider);
        $this->expectException(ProviderKeyNotFoundException::class);

       $this->orderService->registerShipping($order);
    }
}
