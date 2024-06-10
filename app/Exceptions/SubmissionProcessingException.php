<?php

namespace App\Exceptions;

use RuntimeException;
use Throwable;

class SubmissionProcessingException extends RuntimeException
{
    public function __construct(
        string $message = '',
        int $code = 400,
        ?Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
