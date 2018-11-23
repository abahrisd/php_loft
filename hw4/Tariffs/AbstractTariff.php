<?php

namespace hw4\Tariffs;

use Exception;
use hw4\Traits\AddDriver;
use hw4\Traits\AddGPS;

abstract class AbstractTariff implements TariffInterface
{
    use AddGPS;
    use AddDriver;

    protected $pricePerKm = 0;
    protected $pricePerMin = 0;
    protected $driversAge = 0;

    protected $isAddGPS = false;
    protected $isAddDriver = false;

    protected const MIN_AGE = 16;
    protected const MAX_AGE = 65;

    public function __construct($age = 0, $isAddGPS = false, $isAddDriver = false)
    {
        if ($age < self::MIN_AGE || $age > self::MAX_AGE) {
            throw new Exception('Не подходящий возраст');
        }

        $this->driversAge = $age;
        $this->isAddGPS = $isAddGPS;
        $this->isAddDriver = $isAddDriver;
    }

    /**
     * Проверяет корректность входных параметров при расчёте цены
     * @param $minutes
     * @param $kms
     */
    protected function entrysCheck($minutes, $kms)
    {
        if ($minutes < 0 || $kms < 0) {
            throw new Exception('Время и расстояние должны быть положительными числам');
        }
    }

    /**
     * Расчитывает стоимость дополнительных услуг
     * @param $minutes
     * @return float|int
     */
    protected function calculateAdditionalServices($minutes)
    {
        $additionalCost = 0;

        if ($this->isAddGPS) {
            $additionalCost += $this->getAddGPSPrice($minutes);
        }

        if ($this->isAddDriver) {
            $additionalCost += $this->getAddDriverPrice();
        }

        return $additionalCost;
    }

    /**
     * Расчитывает повышающий коэффициент по возрасту
     * @return float|int
     */
    private function getIncreaseFactor()
    {
        return $this->driversAge < 21 ? 1.1 : 1;
    }

    public function getTariffPrice($minutes, $kms)
    {
        return $this->pricePerKm*$kms + $this->pricePerMin*$minutes;
    }

    public function getTotalPrice($minutes, $kms)
    {
        $this->entrysCheck($minutes, $kms);
        $addServicesPrice = $this->calculateAdditionalServices($minutes);
        return $this->getTariffPrice($minutes, $kms)*$this->getIncreaseFactor() + $addServicesPrice;
    }
}
