<?php

declare(strict_types=1);

namespace App;

final class Task
{

    public function __construct(
        private string $title = '',
        private string $id = ''
    )
    {
        if(trim($title) === '') {
            throw new \InvalidArgumentException('タイトルは必須です');
        }
        $this->id = uniqid('', true);
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getId(): string
    {
        return $this->id;
    }
}