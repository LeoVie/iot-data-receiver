<?php

require_once __DIR__ . '/../vendor/autoload.php';

use LeoVie\IotDataReceiver\Validator\IdValidator;
use LeoVie\IotDataReceiver\Validator\TimestampValidator;
use LeoVie\IotDataReceiver\Validator\Validator;
use LeoVie\IotDataReceiver\Validator\ValidatorException;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

/** @var Validator[] $validators */
$validators = [new IdValidator(), new TimestampValidator()];
$values = [];
try {
    foreach ($validators as $validator) {
        $values[$validator::FIELD] = $validator->validateAndReturnValue($_GET);
    }
} catch (ValidatorException $e) {
    print($e->getMessage());
}

var_dump($values);
