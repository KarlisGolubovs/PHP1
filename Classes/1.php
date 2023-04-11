<?php


class Product {
    private $name;
    private $price;
    private $amount;

    public function __construct(string $name, float $startPrice, int $amount) {
        $this->name = $name;
        $this->price = $startPrice;
        $this->amount = $amount;
    }

    public function printProduct() {
        echo "{$this->name}, price {$this->price}, amount {$this->amount}\n";
    }

    public function setAmount(int $amount) {
        $this->amount = $amount;
    }

    public function setPrice(float $price) {
        $this->price = $price;
    }
}

// Test the Product class
$mouse = new Product("Logitech G Pro Wireless", 70.00, 14);
$SmartPhone = new Product("Samsung Galaxy S22", 999.99, 3);
$projector = new Product("Epson EB-U05", 440.46, 1);
$keyBoard = new Product("Nuphy Halo 75", 159.99,200 );

// Change the quantity and price of a product
$mouse->setAmount(20);
$SmartPhone->setPrice(899.99);

$mouse->printProduct();
$SmartPhone->printProduct();
$projector->printProduct();
$keyBoard ->printProduct();