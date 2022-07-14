<?php
namespace f2learn\app\exceptions;

class QueryException extends AppException
{
    public function __construct(string $message, $code = 500)
    {
        parent::__construct($message, $code);
    }
}