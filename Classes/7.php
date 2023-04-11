<?php

class Dog {
    private string $name;
    private string $sex;
    private  $mother;
    private  $father;

    public function __construct($name, $sex, $mother = null, $father = null) {
        $this->name = $name;
        $this->sex = $sex;
        $this->mother = $mother;
        $this->father = $father;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSex(): string
    {
        return $this->sex;
    }

    public function fathersName(): string
    {
        return ($this->father) ? $this->father->getName() : "Unknown";
    }

    public function hasSameMotherAs($otherDog): bool
    {
        if (!$this->mother || !$otherDog->mother) {
            return false;
        }
        return $this->mother->getName() == $otherDog->mother->getName();
    }
}
class DogTest {
    public static function main() {
        $lady = new Dog("Lady", "female");
        $molly = new Dog("Molly", "female");
        $sparky = new Dog("Sparky", "male");
        $buster = new Dog("Buster", "male", $lady, $sparky);
        $sam = new Dog("Sam", "male");
        $rocky = new Dog("Rocky", "male", $molly, $sam);
        $max = new Dog("Max", "male", $lady, $rocky);
        $coco = new Dog("Coco", "female", $molly, $buster);

        echo $coco->fathersName() . "\n";
        echo $sparky->fathersName() . "\n";
        echo $coco->hasSameMotherAs($rocky) . "\n";
    }
}

DogTest::main();