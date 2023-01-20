<?php
declare(strict_types=1);

namespace App\ProviderApi;

use App\Model\RequestInterface;
use Exception;

class ProviderDhl extends AbstractApi
{
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
