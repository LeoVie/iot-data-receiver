<?php

namespace LeoVie\IotDataReceiver\Validator;

class TimestampValidator extends Validator
{
    public const FIELD = 'timestamp';
    protected const PATTERN = '@^\d{10}$@';
}