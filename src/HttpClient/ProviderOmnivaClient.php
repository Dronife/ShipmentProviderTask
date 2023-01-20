<?php
declare(strict_types=1);

namespace App\HttpClient;

use App\ProviderApi\AbstractApi;
use App\ProviderApi\ProviderOmniva;

class ProviderOmnivaClient extends AbstractProviderApiClient
{
    public function __construct(string $omnivaApiBaseUrl)
    {
        parent::__construct($omnivaApiBaseUrl);
    }

    /**
     * @return ProviderOmniva
     */
    public function getProvider(): AbstractApi
    {
        return new ProviderOmniva($this);
    }
}
