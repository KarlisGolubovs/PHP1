<?php
class Account {
    private string $name;
    private int $balance;

    public function __construct($name, $balance) {
        $this->name = $name;
        $this->balance = $balance;
    }

    public function deposit($amount) {
        $this->balance += $amount;
    }

    public function withdrawal($amount) {
        $this->balance -= $amount;
    }

    public function balance(): int
    {
        return $this->balance;
    }

    public function __toString() {
        return $this->name . ", balance " . $this->balance . "\n";
    }
}

$account = new Account("My account", 100.0);
$account->deposit(20.0);
echo $account;

$matts_account = new Account("Matt's account", 1000);
$my_account = new Account("My account", 0);

$matts_account->withdrawal(100);
$my_account->deposit(100);

echo $matts_account;
echo $my_account;