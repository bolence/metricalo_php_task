<?php

namespace App\Services;

use Throwable;

class GlobalService
{

    /**
     * Log error occured in catch block
     *
     * @param string $message
     * @param Throwable $th
     * @return void
     */
    public function logError(string $message, Throwable $th)
    {
        info($message . '' . $th->getMessage() . ' on line ' . $th->getLine() . ' with code ' . $th->getCode());
    }
}
