<?php

// public - accessibile da chiunque da pertutto
// protected - acessibile solo da classi che derivanno
// private - acessibile dalla classe stessa

interface Shape
{
    protected $color;

    public function __construct($color = 'Blue')
    {
        $this->color = $color;
    }

    protected function getColor()
    {
        return $this->color;
    }

    abstract protected function getArea();
}

class Square extends Shape
{
    protected $height = 4;
    public function getArea()
    {
        return pow($this->height, 2);
    }
}

class Triangle extends Shape
{
    protected $base = 6;
    protected $height = 9;

    public function getArea()
    {
        return ($this->base * $this->height) / 2;
    }
}

class Circle extends Shape
{
    protected $radius = 5;
    public function getArea()
    {
        return pi() * pow($this->radius, 2);
    }
}

// $shape = new Shape;

// echo (new Triangle)->getColor();

// $square = new Square('Green');
// echo $square->getColor();

$circle = new Circle;

echo $circle->getArea();
