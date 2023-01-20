<?php
declare(strict_types=1);

namespace App\HttpClient;

use App\Factory\SerializerFactory;
use App\ProviderApi\AbstractApi;
use Http\Client\Common\HttpMethodsClientInterface;
use Http\Client\Common\Plugin\BaseUriPlugin;
use Http\Client\Common\Plugin\HeaderDefaultsPlugin;
use Http\Discovery\Psr17FactoryDiscovery;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

abstract class AbstractProviderApiClient
{
    /**
     * @var ClientBuilder $clientBuilder
     */
    private $clientBuilder;

    /**
     * @var Serializer
     */
    private $serializer;

    public function __construct(string $baseUri)
    {
        $this->clientBuilder = new ClientBuilder();
        $uriFactory = Psr17FactoryDiscovery::findUriFactory();
        $this->clientBuilder->addPlugin(new BaseUriPlugin($uriFactory->createUri($baseUri)));
        $this->clientBuilder->addPlugin(
            new HeaderDefaultsPlugin(
                [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ]
            )
        );

        $this->serializer = SerializerFactory::create();
    }

    public function getHttpClient(): HttpMethodsClientInterface
    {
        return $this->getHttpClientBuilder()->getHttpClient();
    }

    protected function getHttpClientBuilder(): ClientBuilder
    {
        return $this->clientBuilder;
    }

    public function getSerializer(): SerializerInterface
    {
        return $this->serializer;
    }

    abstract public function getProvider(): AbstractApi;
}
