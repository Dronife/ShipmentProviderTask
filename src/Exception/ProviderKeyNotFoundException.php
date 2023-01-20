<?php
declare(strict_types=1);

namespace App\Exception;

use Exception;

class ProviderKeyNotFoundException extends Exception
{
    public function __construct(string $providerKey, $code = 0, Exception $previous = null)
    {
        $message = sprintf("You have requested a non-existent provider key: '%s'", $providerKey);
        parent::__construct($message, $code, $previous);
    }

    public function __toString()
    {
        return __CLASS__.": [{$this->code}]: {$this->message}\n";
    }
}
