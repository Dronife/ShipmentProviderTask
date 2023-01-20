<?php
declare(strict_types=1);

namespace App\Tests\Unit\HttpClient;

use App\HttpClient\ClientBuilder;
use Http\Client\Common\HttpMethodsClient;
use Http\Client\Common\Plugin\HeaderDefaultsPlugin;
use Http\Client\Common\PluginClientFactory;
use Http\Discovery\HttpClientDiscovery;
use Http\Discovery\Psr17FactoryDiscovery;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class ClientBuilderTest extends TestCase
{
    /**
     * @var ClientBuilder|object|null $clientBuilder
     */
    private $clientBuilder;

    protected function setUp(): void
    {
        $container = new ContainerBuilder();
        $container->register(ClientBuilder::class, ClientBuilder::class)
            ->setAutowired(true);
        $this->clientBuilder = $container->get(ClientBuilder::class);
    }

    /**
     * @test
     */
    public function clientBuilderSuccessfullyReturnsHttpClient(): void
    {
        $httpClient = new HttpMethodsClient(
            (new PluginClientFactory())->createClient(HttpClientDiscovery::find(), []),
            Psr17FactoryDiscovery::findRequestFactory(),
            Psr17FactoryDiscovery::findStreamFactory()
        );

        $this->assertEquals($this->clientBuilder->getHttpClient(), $httpClient);
    }

    /**
     * @test
     */
    public function clientBuilderSuccessfullyAddsPlugin(): void
    {
        $plugin = new HeaderDefaultsPlugin(['Content-Type' => 'application/json']);
        $httpClient = new HttpMethodsClient(
            (new PluginClientFactory())->createClient(HttpClientDiscovery::find(), [$plugin]),
            Psr17FactoryDiscovery::findRequestFactory(),
            Psr17FactoryDiscovery::findStreamFactory()
        );
        $this->clientBuilder->addPlugin($plugin);

        $this->assertEquals($this->clientBuilder->getHttpClient(), $httpClient);
    }
}
