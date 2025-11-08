<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class NotificationServiceTest extends TestCase
{
    public function test_通知が正常に送信されること(): void
    {
        $mailer = $this->createStub(Mailer::class);
        $mailer->method('sendEmail')
            ->willReturn(true);

        $service = new NotificationService($mailer);
        $result = $service->sendNotification('test@example.com', 'Test Subject');
        $this->assertTrue($result);
    }
}