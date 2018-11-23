<?php

namespace hw4\Tariffs;

class HourTariff extends AbstractTariff implements TariffInterface
{

    protected $pricePerKm = 0;
    protected $pricePerHour = 200;

    public function calculatePrice($minutes, $kms)
    {
        if ($minutes === 0) {
            return $this->pricePerHour;
        }
        return ceil($minutes/60)*$this->pricePerHour;
    }
}