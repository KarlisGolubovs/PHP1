<?php declare(strict_types=1);

namespace App\Models;

class Enterprise
{
    private string $name;
    private string $regCode;
    private string $address;
    private int $employeesCount;
    private float $revenue;

    public function __construct(string $name, string $regCode, string $address, int $employeesCount, float $revenue)
    {
        $this->name = $name;
        $this->regCode = $regCode;
        $this->address = $address;
        $this->employeesCount = $employeesCount;
        $this->revenue = $revenue;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getRegCode(): string
    {
        return $this->regCode;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getEmployeesCount(): int
    {
        return $this->employeesCount;
    }

    public function getRevenue(): float
    {
        return $this->revenue;
    }

    public function getEmployeesPerRevenue(): float
    {
        return $this->employeesCount / $this->revenue;
    }
}
