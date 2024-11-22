<?php

namespace dwes\app\exceptions;

use dwes\app\exceptions\AppException;

class QueryException extends AppException
{
    public function __construct(string $message = "", int $code = 500)
    {
        parent::__construct($message, $code);
    }
}
