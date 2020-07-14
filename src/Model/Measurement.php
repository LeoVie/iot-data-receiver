<?php

namespace LeoVie\IotDataReceiver\Model;

class Measurement
{
    private string $sensorId;
    private string $timestamp;
    private int $value;

    public static function fromArray(array $data): self
    {
        return new Measurement($data['id'], $data['timestamp'], $data['value']);
    }

    private function __construct(string $sensorId, string $timestamp, int $value)
    {
        $this->sensorId = $sensorId;
        $this->timestamp = $timestamp;
        $this->value = $value;
    }

    public function getSensorId(): string
    {
        return $this->sensorId;
    }

    public function getTimestamp(): string
    {
        return $this->timestamp;
    }

    public function getValue(): int
    {
        return $this->value;
    }
}