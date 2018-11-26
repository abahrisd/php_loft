<?php

namespace hw4\Tariffs;
use Exception;

class BasicTariff extends AbstractTariff
{
    protected $pricePerKm = 10;
    protected $pricePerMin = 3;

    public function __construct($age, $isAddGPS = false, $isAddDriver = false)
    {
        if ($isAddDriver) {
            throw new Exception('Опция "Дополнительный водитель недоступна на тарифе "Базовый"');
        }

        parent::__construct($age, $isAddGPS, $isAddDriver);
    }

    public function getTariffPrice($minutes, $kms)
    {
        $priceByDistance = $this->pricePerKm*$kms;
        $priceByTime = $this->pricePerMin*$minutes;

        return ($priceByDistance + $priceByTime);
    }
}
