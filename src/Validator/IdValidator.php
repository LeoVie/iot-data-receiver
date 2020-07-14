<?php

namespace LeoVie\IotDataReceiver\Validator;

class IdValidator extends Validator
{
    public const FIELD = 'id';
    protected const PATTERN = '@^(?:(?:\d|[a-f]){2}:){7}(?:(?:\d|[a-f]){2}-){2}(?:\d|[a-f]){4}$@';
}