<?php

class LightSwitch
{
    public function on()
    {
        $this->enable();
        $this->connect();
    }

    public function off()
    {
    }

    private function enable()
    {
    }

    private function connect()
    {
        return 'Connecting';
    }
}


$sw = new LightSwitch();

var_dump($sw->on());
