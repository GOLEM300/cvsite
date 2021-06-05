<?php

if (! function_exists('date_sum'))
{
    function date_sum(array $total) : string
    {
        $years = [];
        $months = [];
        $totalYears = 0;
        $totalMonths = 0;

        foreach($total as $key => $date)
        {
            $years[$key] = explode(" ",$total[$key]);
            $months[$key] = explode(" ",$total[$key]);
        }
        foreach($years as $key => $value)
        {
            $totalYears += $years[$key][0];
        }
        foreach($months as $key => $value)
        {
            $totalMonths += $years[$key][2];
        }

        if ($totalMonths > 12)
        {
            $totalMonths = intdiv($totalMonths,12);
        }

        return floor($totalYears + $totalMonths/12).' лет '.ceil($totalMonths).' месяцев';
    }
}