<?php

declare(strict_types=1);
use PHPUnit\Framework\TestCase;

use App\Person;

final class PersonTest extends TestCase
{
    public function testGetFullName(): void
    {
        $person = new Person();
        $person->setFirstName('John');
        $person->setSurname('Doe');

        $this->assertSame('John Doe', $person->getFullName());
    }
}