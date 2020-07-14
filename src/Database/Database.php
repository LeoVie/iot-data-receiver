<?php

namespace LeoVie\IotDataReceiver\Database;

use LeoVie\IotDataReceiver\Model\Measurement;
use mysqli;

class Database
{
    public static mysqli $mysqli;

    private function getMysqli(): mysqli
    {
        if (!isset(static::$mysqli)) {
            static::$mysqli = new mysqli(
                $_ENV['DATABASE_HOST'],
                $_ENV['DATABASE_USER'],
                $_ENV['DATABASE_PASSWORD'],
                $_ENV['DATABASE_DATABASE'],
                $_ENV['DATABASE_PORT'],
            );
        }

        return self::$mysqli;
    }

    public function storeMeasurement(Measurement $measurement): void
    {
        $mysqli = $this->getMysqli();
        $this->createMeasurementTableIfNotExists();

        $timestamp = date("Y-m-d H:i:s", (int) $measurement->getTimestamp());
        $statement = "INSERT INTO measurement VALUES ('{$measurement->getSensorId()}', '$timestamp', {$measurement->getValue()});";

        $mysqli->query($statement);
    }

    private function createMeasurementTableIfNotExists(): void
    {
        $statement = "SELECT * FROM information_schema.tables WHERE table_schema = '{$_ENV['DATABASE_DATABASE']}' AND table_name = 'measurement' LIMIT 1;";

        $mysqli = $this->getMysqli();
        $result = $mysqli->query($statement);

        if ($result instanceof \mysqli_result && $result->num_rows === 0) {
            print("Table does not exist!\n");
        }

        $statement = "CREATE TABLE measurement (sensor_id VARCHAR(32), measure_time TIMESTAMP, value INT);";
        $mysqli->query($statement);
    }
}