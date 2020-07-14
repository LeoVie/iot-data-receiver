<?php

namespace LeoVie\IotDataReceiver\Test\Validator;

use LeoVie\IotDataReceiver\Validator\IdValidator;
use LeoVie\IotDataReceiver\Validator\MissingException;
use LeoVie\IotDataReceiver\Validator\PatternException;
use PHPUnit\Framework\TestCase;

class IdValidatorTest extends TestCase
{
    private IdValidator $idValidator;

    protected function setUp(): void
    {
        $this->idValidator = new IdValidator();
    }

    public function testFailsWithMissingId(): void
    {
        $this->expectException(MissingException::class);
        $this->idValidator->validateAndReturnValue([]);
    }

    public function testFailsWithIllegalId(): void
    {
        $this->expectException(PatternException::class);
        $this->idValidator->validateAndReturnValue(['id' => 123]);
    }

    public function testSuccess(): void
    {
        $id = '00:15:8d:00:05:3f:34:f2-01-0403';
        $actual = $this->idValidator->validateAndReturnValue(['id' => $id]);

        self::assertSame($id, $actual);
    }
}