<?php

class Person
{
    public $name;
    private $age;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getAge()
    {
        return $this->age  * 365;
    }

    public function setAge($age)
    {
        if ($age < 18) {
            throw new Exception('dati invalidi');
        }
        $this->age = $age;
    }
}


$tom = new Person('Tom');

$tom->setAge(19);
// $tom->age = 10;
// $tom->age++;

var_dump($tom->getAge());

// var_dump($tom);
