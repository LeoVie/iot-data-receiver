<?php

namespace LeoVie\IotDataReceiver\Validator;

class ValueValidator extends Validator
{
    public const FIELD = 'value';
    protected const PATTERN = '@^\d+$@';
}