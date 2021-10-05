<?php

namespace App\Models;

class Task
{
    private int $number;
    private string $description;

    public function __construct(int $number, string $description)
    {
        $this->number = $number;
        $this->description = $description;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getTaskArray(): array
    {
        return [$this->number, $this->description];
    }

}