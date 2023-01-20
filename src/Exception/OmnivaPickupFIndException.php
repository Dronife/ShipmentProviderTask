<?php
declare(strict_types=1);

namespace App\Exception;

use Exception;

class OmnivaPickupFIndException extends Exception
{
    public function __construct($code = 0, Exception $previous = null)
    {
        $message = "Something bad happened. Unable to get pickup point id from omniva endpoint";
        parent::__construct($message, $code, $previous);
    }

    public function __toString()
    {
        return __CLASS__.": [{$this->code}]: {$this->message}\n";
    }
}
