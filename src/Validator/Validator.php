<?php

namespace LeoVie\IotDataReceiver\Validator;

abstract class Validator
{
    public const FIELD = '';
    protected const PATTERN = '';

    /**
     * @throws ValidatorException
     */
    public function validateAndReturnValue(array $parameters): string
    {
        if (!array_key_exists(static::FIELD, $parameters)) {
            throw new MissingException(static::FIELD);
        }
        if (!preg_match(static::PATTERN, $parameters[static::FIELD])) {
            throw new PatternException(static::FIELD);
        }

        return $parameters[static::FIELD];
    }
}