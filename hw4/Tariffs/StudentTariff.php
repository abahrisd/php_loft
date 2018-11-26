<?php
namespace hw4\Tariffs;

use Exception;

class StudentTariff extends AbstractTariff
{
    protected $pricePerKm = 4;
    protected $pricePerMin = 1;

    protected const MAX_AGE = 25;

    public function __construct($age, $isAddGPS = false, $isAddDriver = false)
    {
        if ($isAddDriver) {
            throw new Exception('Опция "Дополнительный водитель недоступна на тарифе "Студенческий"');
        }

        parent::__construct($age, $isAddGPS, $isAddDriver);
    }

    public function calculatePrice($minutes, $kms)
    {
        return $minutes * $this->pricePerMin + $kms * $this->pricePerKm;
    }

    public function getTariffPrice($minutes, $kms)
    {
        return $this->pricePerKm * $kms + $this->pricePerMin * $minutes;
    }
}
