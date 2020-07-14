<?php

namespace LeoVie\IotDataReceiver\Test\Validator;

use LeoVie\IotDataReceiver\Validator\MissingException;
use LeoVie\IotDataReceiver\Validator\PatternException;
use LeoVie\IotDataReceiver\Validator\TimestampValidator;
use PHPUnit\Framework\TestCase;

class TimestampValidatorTest extends TestCase
{
    private TimestampValidator $timestampValidator;

    protected function setUp(): void
    {
        $this->timestampValidator = new TimestampValidator();
    }

    public function testFailsWithMissingId(): void
    {
        $this->expectException(MissingException::class);
        $this->timestampValidator->validateAndReturnValue([]);
    }

    public function testFailsWithIllegalId(): void
    {
        $this->expectException(PatternException::class);
        $this->timestampValidator->validateAndReturnValue(['timestamp' => 123]);
    }

    public function testSuccess(): void
    {
        $timestamp = '1234567890';
        $actual = $this->timestampValidator->validateAndReturnValue(['timestamp' => $timestamp]);

        self::assertSame($timestamp, $actual);
    }
}