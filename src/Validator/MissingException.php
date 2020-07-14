<?php

namespace LeoVie\IotDataReceiver\Validator;

class MissingException extends \Exception implements ValidatorException
{
    public function __construct(string $field)
    {
        $message = "Field '$field' missing.";

        parent::__construct($message);
    }
}