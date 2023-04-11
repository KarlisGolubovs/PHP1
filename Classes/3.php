<?php


class FuelGauge
{
private int $fuel;

public function __construct()
{
$this->fuel = 0;
}

public function getFuel(): int
{
return $this->fuel;
}

public function incrementFuel(): void
{
if ($this->fuel < 70) {
$this->fuel++;
    }
}

public function decrementFuel(): void
{
if ($this->fuel > 0) {
$this->fuel--;
        }
    }
}

class Odometer
{
private int $mileage;
private FuelGauge $fuelGauge;

public function __construct(FuelGauge $fuelGauge)
{
$this->mileage = 0;
$this->fuelGauge = $fuelGauge;
}

public function getMileage(): int
{
return $this->mileage;
}

public function incrementMileage(): void
{
if ($this->mileage < 999999) {
$this->mileage++;
} else {
$this->mileage = 0;
}

if ($this->mileage % 10 == 0) {
$this->fuelGauge->decrementFuel();
        }
    }
}

// Test the FuelGauge and Odometer classes
$fuelGauge = new FuelGauge();
$odometer = new Odometer($fuelGauge);

// Fill up the car with fuel
while ($fuelGauge->getFuel() < 70) {
$fuelGauge->incrementFuel();
}

// Drive until the car runs out of fuel
while ($fuelGauge->getFuel() > 0) {
$odometer->incrementMileage();
echo "Mileage: " . $odometer->getMileage() . " km\n";
echo "Fuel: " . $fuelGauge->getFuel() . " liters\n";
}
