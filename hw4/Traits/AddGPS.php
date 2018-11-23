<?php

namespace hw4\Traits;

trait AddGPS
{
    private $gpsPricePerHour = 15;

    public function getAddGPSPrice($minutes)
    {
        if ($minutes < 60) {
            return $this->gpsPricePerHour;
        }
        return ceil($minutes/60)*$this->gpsPricePerHour;
    }
}
