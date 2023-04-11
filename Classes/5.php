<?php

class Date {
    private $month;
    private $day;
    private $year;

    public function __construct($month, $day, $year) {
        $this->month = $month;
        $this->day = $day;
        $this->year = $year;
    }

    public function getMonth() {
        return $this->month;
    }

    public function setMonth($month) {
        $this->month = $month;
    }

    public function getDay() {
        return $this->day;
    }

    public function setDay($day) {
        $this->day = $day;
    }

    public function getYear() {
        return $this->year;
    }

    public function setYear($year) {
        $this->year = $year;
    }

    public function displayDate() {
        echo $this->month . "/" . $this->day . "/" . $this->year;
    }
}
$date = new Date(4, 11, 2023);
echo "The date is: ";
$date->displayDate();
echo "\n";

$date->setMonth(5);
$date->setYear(2024);

echo "The updated date is: ";
$date->displayDate();
echo "\n";
