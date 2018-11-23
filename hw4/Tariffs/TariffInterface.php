<?php

namespace hw4\Tariffs;

interface TariffInterface
{
    public function getTariffPrice($minutes, $kms);
}
