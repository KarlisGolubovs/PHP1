<?php



const MAX_HOURS = 60; // hours
const MIN_WAGE = 8.00; // $/hour


function calculatePay($basePay, $hoursWorked) {
    // Calculate the pay for the employee
    if ($hoursWorked > MAX_HOURS) {
        echo "Error: Employee worked more than 60 hours in a week.\n";
    } elseif ($hoursWorked <= 40) {
        $pay = $hoursWorked * $basePay;
    } else {
        $regularHours = 40;
        $overtimeHours = $hoursWorked - 40;
        $pay = ($regularHours * $basePay) + ($overtimeHours * $basePay * 1.5);
    }

    if ($pay < ($hoursWorked * MIN_WAGE)) {
        echo "Error: Employee's pay is below the minimum wage requirement.\n";
    } else {
        echo "The employee's pay for this week is: $" . number_format($pay, 2) . "\n";
    }
}

function main() {
    echo "Employee 1:\n";
    calculatePay(7.50, 35);

    echo "Employee 2:\n";
    calculatePay(8.20, 47);

    echo "Employee 3:\n";
    calculatePay(10.00, 73);
}

main();

