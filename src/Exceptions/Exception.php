<?php
namespace Adolfocuadros\NubefactClient\Exceptions;


class Exception extends \Exception
{
    private $body;

    public function __construct($body, \Exception $previous = null)
    {
        $this->body = \GuzzleHttp\json_decode($body);
        \Exception::__construct($this->body->errors, $this->body->codigo, $previous);
    }
}