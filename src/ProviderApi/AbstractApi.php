<?php
declare(strict_types=1);

namespace App\ProviderApi;

use App\Constant\DataFormat;
use App\HttpClient\AbstractProviderApiClient;
use App\Model\RequestInterface;

class AbstractApi
{
    /**
     * @var AbstractProviderApiClient $client
     */
    private $client;

    public function __construct(AbstractProviderApiClient $client)
    {
        $this->client = $client;
    }

    protected function post(
        string $path,
        ?RequestInterface $request = null,
        ?string $responseClass = null,
        array $requestHeaders = []
    ) {
        $response = $this->client->getHttpClient()->post(
            $path,
            $requestHeaders,
            $request === null ? null : $this->client->getSerializer()->serialize($request, DataFormat::JSON)
        );
        if ($responseClass === null) {
            return $response->getBody()->getContents();
        }

        return $this->client->getSerializer()->deserialize(
            $response->getBody()->getContents(),
            $responseClass,
            DataFormat::JSON
        );
    }
}
