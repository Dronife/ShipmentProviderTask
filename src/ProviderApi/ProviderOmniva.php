<?php
declare(strict_types=1);

namespace App\ProviderApi;

use App\Model\Omniva\Response\OmnivaFindResponse;
use App\Model\RequestInterface;
use App\Model\ResponseInterface;
use Exception;

class ProviderOmniva extends AbstractApi
{
    /**
     * @return OmnivaFindResponse
     */
    public function pickUpFind(RequestInterface $request): ?ResponseInterface
    {
        try {
            $this->post('/pickup/find', $request);
        }catch(Exception $e)
        {
            return (new OmnivaFindResponse())->setPickupPointId(md5("".rand(4,8)));
        }

        return null;
    }

    public function register(RequestInterface $request): void
    {
        try {
            $this->post('/register', $request);
        }catch(Exception $e)
        {
            return;
        }
    }
}
