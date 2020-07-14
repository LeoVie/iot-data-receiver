<?php

require_once __DIR__ . '/../vendor/autoload.php';

use LeoVie\IotDataReceiver\Model\Measurement;
use LeoVie\IotDataReceiver\Database\Database;
use LeoVie\IotDataReceiver\Validator\IdValidator;
use LeoVie\IotDataReceiver\Validator\TimestampValidator;
use LeoVie\IotDataReceiver\Validator\Validator;
use LeoVie\IotDataReceiver\Validator\ValidatorException;
use LeoVie\IotDataReceiver\Validator\ValueValidator;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../', '.env');
$dotenv->load();

$database = new Database();

/** @var Validator[] $validators */
$validators = [new IdValidator(), new TimestampValidator(), new ValueValidator()];
$values = [];
try {
    foreach ($validators as $validator) {
        $values[$validator::FIELD] = $validator->validateAndReturnValue($_GET);
    }
    $measurement = Measurement::fromArray($values);

    $database->storeMeasurement($measurement);
} catch (ValidatorException $e) {
    print($e->getMessage());
}
