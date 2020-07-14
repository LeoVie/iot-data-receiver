<?php

namespace LeoVie\IotDataReceiver\Test\Validator;

use LeoVie\IotDataReceiver\Validator\MissingException;
use LeoVie\IotDataReceiver\Validator\PatternException;
use LeoVie\IotDataReceiver\Validator\ValueValidator;
use PHPUnit\Framework\TestCase;

class ValueValidatorTest extends TestCase
{
    private ValueValidator $valueValidator;

    protected function setUp(): void
    {
        $this->valueValidator = new ValueValidator();
    }

    public function testFailsWithMissingId(): void
    {
        $this->expectException(MissingException::class);
        $this->valueValidator->validateAndReturnValue([]);
    }

    public function testFailsWithIllegalId(): void
    {
        $this->expectException(PatternException::class);
        $this->valueValidator->validateAndReturnValue(['value' => 'evil value']);
    }

    public function testSuccess(): void
    {
        $value = '123';
        $actual = $this->valueValidator->validateAndReturnValue(['value' => $value]);

        self::assertSame($value, $actual);
    }
}