<?php

class BankAccount {
    private string $name;
    private int $balance;

    public function __construct($name, $balance) {
        $this->name = $name;
        $this->balance = $balance;
    }

    public function show_user_name_and_balance(): string
    {
        $formatted_balance = sprintf('$%.2f', abs($this->balance));
        if ($this->balance < 0) {
            $formatted_balance = '-' . $formatted_balance;
        }
        return "{$this->name}, $formatted_balance";
    }
}
$ben = new BankAccount('Benson', 17.25);
echo $ben->show_user_name_and_balance();

$amy = new BankAccount('Amy', -17.5);
echo $amy->show_user_name_and_balance();
