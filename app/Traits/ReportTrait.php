<?php

namespace App\Traits;

use Carbon\Carbon;

trait ReportTrait
{
    private function getFromDate()
    {
        $request = \request();
        $paramDate = $request->get('date');
        $array = [
            '1d' => Carbon::now()->subDays(1),
            '1k' => Carbon::now()->subDays(7),
            '2k' => Carbon::now()->subDays(14),
            '1m' => Carbon::now()->subDays(30),
            '3m' => Carbon::now()->subDays(60),
            '6m' => Carbon::now()->subDays(180),
        ];

        return $array[$paramDate] ?? null;
    }
}
