<?php

declare(strict_types=1);
use PHPUnit\Framework\TestCase;

use App\Person;

final class PersonTest extends TestCase
{
    public function test_苗字＋名前を取得できること(): void
    {
        $person = new Person();
        $person->setFirstName('John');
        $person->setSurname('Doe');

        $this->assertSame('John Doe', $person->getFullName());
    }

    public function test_未実装の項目(): void
    {
        $this->markTestIncomplete('このテストは未実装です。');
    }
}