<?php

class Mother
{
    public function getEyeCount()
    {
        return 2;
    }
}

class Child extends Mother
{
}

echo (new Child)->getEyeCount();
