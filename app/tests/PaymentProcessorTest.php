<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class PaymentProcessorTest extends TestCase
{
    public function test(): void
    {
        $processor = $this->getMockBuilder(PaymentProcessor::class)
            ->setConstructorArgs(['test_api_key'])
            ->onlyMethods(['charge'])
            ->getMock();

        $processor->expects($this->once())
            ->method('charge')
            ->with(100)
            ->willReturn('Mocked charge of 100');

        $this->assertSame('Mocked charge of 100', $processor->charge(100));

        $this->expectOutputString('Transaction for 100 logged');
        $processor->logTransaction(100);
    }
}
