<?php

namespace App\Services\Tools;

class Tool
{
    /**
     * countRate 計算殖利率
     * 
     * @return integer 計算殖利率
     */
    public function countRate($_iPrice, $_iDividend)
    {
        $iRate = ($_iDividend/$_iPrice)*100;
        $iRate = number_format($iRate, 3);
        return $iRate;
    }
}