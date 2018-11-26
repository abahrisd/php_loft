<?php

namespace hw4\Traits;

trait AddDriver
{
    protected $driverStatus = false;

    public function onDriver()
    {
        $this->driverStatus = true;
    }

    public function offDriver()
    {
        $this->driverStatus = false;
    }

    public function getAddDriverPrice()
    {
        return 100;
    }
}
