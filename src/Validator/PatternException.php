<?php

namespace LeoVie\IotDataReceiver\Validator;

class PatternException extends \Exception implements ValidatorException
{
    public function __construct(string $field)
    {
        $message = "Field '$field' does not match pattern.";

        parent::__construct($message);
    }
}