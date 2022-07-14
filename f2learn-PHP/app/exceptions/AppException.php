<?php
namespace f2learn\app\exceptions;

use Exception;
use f2learn\core\Response;

class AppException extends Exception
{
    /**
     * @param string $message
     * @param int $code
     */
    public function __construct(string $message, $code = 500)
    {
        parent::__construct($message, $code);
    }

    /**
     * @return string|void
     */
    private function getHttpHeaderMessage()
    {
        switch ($this->getCode()) {
            case 404:
                return '404'; // Not Found
            case 403:
                return '403'; // Forbidden
            case 500:
                return '500'; // Internal Server Error
        }
    }

    public function handleError()
    {
        try {
            $httpHeaderMessage = $this->getHttpHeaderMessage();

            header($_SERVER['SERVER_PROTOCOL'] . ' ' . $httpHeaderMessage, true, $this->getCode());

            $errorMessage = $this->getMessage();

            Response::renderView('error', 'layout-simple', compact('httpHeaderMessage', 'errorMessage'));

        } catch (Exception $exception) {
            die('An error has occurred in the exception handler.');
        }
    }
}