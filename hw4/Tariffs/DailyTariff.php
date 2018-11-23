<?php

namespace hw4\Tariffs;

class DailyTariff extends AbstractTariff implements TariffInterface
{

    protected $pricePerKm = 1;
    protected $pricePerDay = 1000;

    public function calculatePrice($minutes, $kms)
    {
        if ($minutes < 30) {
            return $this->pricePerDay + $this->pricePerKm*$kms;
        }

        return ceil(($minutes - 30)/1440)*$this->pricePerDay + $this->pricePerKm*$kms;
    }
}
