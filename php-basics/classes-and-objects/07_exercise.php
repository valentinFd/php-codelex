<?php

class Dog
{
    private string $name;

    private string $sex;

    private Dog $mother;

    public function setMother(Dog $mother)
    {
        $this->mother = $mother;
    }

    private Dog $father;

    public function fathersName(): string
    {
        if (isset($this->father)) return $this->father->name;
        return "Unknown";
    }

    public function setFather(Dog $father)
    {
        $this->father = $father;
    }

    public function __construct(string $name, string $sex)
    {
        $this->name = $name;
        $this->sex = $sex;
    }

    public function hasSameMotherAs(Dog $dog): bool
    {
        return $this->mother === $dog->mother;
    }
}

class DogTest
{
    public function main()
    {
        $max = new Dog("Max", "male");
        $rocky = new Dog("Rocky", "male");
        $sparky = new Dog("Sparky", "male");
        $buster = new Dog("Buster", "male");
        $sam = new Dog("Sam", "male");
        $lady = new Dog("Lady", "female");
        $molly = new Dog("Molly", "female");
        $coco = new Dog("Coco", "female");

        $max->setMother($lady);
        $max->setFather($rocky);

        $coco->setMother($molly);
        $coco->setFather($buster);

        $rocky->setMother($molly);
        $rocky->setFather($sam);

        $buster->setMother($lady);
        $buster->setFather($sparky);

        echo $coco->fathersName() . PHP_EOL;
        echo $sparky->fathersName() . PHP_EOL;
        echo $max->hasSameMotherAs($buster) ? "True" : "False";
        echo PHP_EOL;
        echo $max->hasSameMotherAs($coco) ? "True" : "False";
        echo PHP_EOL;
    }
}

$test = new DogTest();
$test->main();
