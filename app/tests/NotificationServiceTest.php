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

    public function test_通知の送信に失敗した場合に例外がスローされること(): void
    {
        $mailer = $this->createStub(Mailer::class);
        $mailer->method('sendEmail')
            ->will($this->throwException(new RuntimeException('SMTP server not reachable')));

        $service = new NotificationService($mailer);

        $this->expectException(NotificationException::class);
        $this->expectExceptionMessage('Failed to send notification');

        $service->sendNotification('test@example.com', 'Test Subject');
    }

    public function test_メール送信が成功すること(): void
    {
        $mailer = $this->createMock(Mailer::class);
        $mailer->expects($this->once())
            ->method('sendEmail')
            ->with('test@example.com','New Notification', 'Test Subject')
            ->willReturn(true);

        $service = new NotificationService($mailer);
        $this->assertTrue($service->sendNotification(
            'test@example.com',
            'Test Subject'
        ));
    }
}