<?php

namespace hw4\Tariffs;
use Exception;

class StudentTariff extends AbstractTariff implements TariffInterface
{

    protected $pricePerKm = 4;
    protected $pricePerMin = 1;

    protected const MAX_AGE = 25;

    public function __construct($age = 0, $isAddGPS = false, $isAddDriver = false)
    {
        if ($isAddDriver) {
            throw new Exception('Опция "Дополнительный водитель недоступна на тарифе "Студенческий"');
        }

        parent::__construct($age, $isAddGPS, $isAddDriver);
    }

    public function calculatePrice($minutes, $kms)
    {
        return $minutes*$this->pricePerMin + $kms*$this->pricePerKm;
    }
}
