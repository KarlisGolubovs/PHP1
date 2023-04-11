<?php

class SavingsAccount {
    private int $annualInterestRate;
    private int $balance;

    public function __construct($balance) {
        $this->balance = $balance;
        $this->annualInterestRate = 0;
    }

    public function setAnnualInterestRate($annualInterestRate) {
        $this->annualInterestRate = $annualInterestRate;
    }

    public function getBalance(): int
    {
        return $this->balance;
    }

    public function withdraw($amount) {
        $this->balance -= $amount;
    }

    public function deposit($amount) {
        $this->balance += $amount;
    }

    public function addMonthlyInterest() {
        $monthlyInterestRate = $this->annualInterestRate / 12;
        $monthlyInterest = $this->balance * $monthlyInterestRate;
        $this->balance += $monthlyInterest;
    }
}

// Test the class
echo "How much money is in the account?: ";
$startingBalance = floatval(fgets(STDIN));
echo "Enter the annual interest rate: ";
$annualInterestRate = floatval(fgets(STDIN));
echo "How long has the account been opened? ";
$numMonths = intval(fgets(STDIN));

$savingsAccount = new SavingsAccount($startingBalance);
$savingsAccount->setAnnualInterestRate($annualInterestRate);

$totalDeposits = 0;
$totalWithdrawals = 0;
$totalInterestEarned = 0;

for ($month = 1; $month <= $numMonths; $month++) {
    echo "Enter amount deposited for month $month: ";
    $depositAmount = floatval(fgets(STDIN));
    $savingsAccount->deposit($depositAmount);
    $totalDeposits += $depositAmount;

    echo "Enter amount withdrawn for $month: ";
    $withdrawalAmount = floatval(fgets(STDIN));
    $savingsAccount->withdraw($withdrawalAmount);
    $totalWithdrawals += $withdrawalAmount;

    $savingsAccount->addMonthlyInterest();
    $totalInterestEarned += $savingsAccount->getBalance() - ($totalDeposits - $totalWithdrawals);
}

$endingBalance = $savingsAccount->getBalance();

echo "Total deposited: $" . number_format($totalDeposits, 2) . "\n";
echo "Total withdrawn: $" . number_format($totalWithdrawals, 2) . "\n";
echo "Interest earned: $" . number_format($totalInterestEarned, 2) . "\n";
echo "Ending balance: $" . number_format($endingBalance, 2) . "\n";
