<?php

namespace f2learn\app\exceptions;

class AuthenticationException extends AppException
{
    public function __construct(string $message, $code = 403)
    {
        parent::__construct($message, $code);
    }
}