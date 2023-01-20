<?php
declare(strict_types=1);

namespace App\HttpClient;

use App\ProviderApi\AbstractApi;
use App\ProviderApi\ProviderDhl;

class ProviderDhlClient extends AbstractProviderApiClient
{
    public function __construct(string $dhlApiBaseUrl)
    {
        parent::__construct($dhlApiBaseUrl);
    }

    /**
     * @return ProviderDhl
     */
    public function getProvider(): AbstractApi
    {
        return new ProviderDhl($this);
    }
}
