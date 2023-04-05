<?php declare(strict_types=1);

class CoinDenominations {
    public array $acceptedCoins = array(5, 10, 25, 100, 200);
}

class VendingMachineProduct {
    public string $product;
    public int $price;
    public string $productCode;
    public coinDenominations $coinDenominations;

    public function __construct(string $product,int $price,string $productCode,coinDenominations $coinDenominations) {
        $this->product = $product;
        $this->price = $price;
        $this->productCode = $productCode;
        $this->coinDenominations = $coinDenominations;
    }
}

$coinDenominations = new CoinDenominations();
$products = array(
    new VendingMachineProduct("Soda", 150, "A1", $coinDenominations),
    new VendingMachineProduct("Chips", 125, "A2", $coinDenominations),
    new VendingMachineProduct("Candy", 75, "A3", $coinDenominations)
);

foreach ($products as $product) {
        echo $product->productCode . " - " . $product->product . " - " . number_format($product->price/100, 2) . PHP_EOL;
}
echo "Select the product: " . "\n";
$getProductCode = trim(fgets(STDIN));

$selectedProduct = null;
foreach ($products as $product) {
    if ($product->productCode === $getProductCode) {
        $selectedProduct = $product;
        break;
    }

}

if ($selectedProduct) {
    echo 'Please insert coins' . "\n";
    $price = $selectedProduct->price /100;
    echo 'Total: $' . number_format($price,2) . "\n";
} else {
    echo 'Invalid product code!' . "\n";
}
$coinInput = intval(fgets(STDIN));
$payment = $price - $coinInput;
