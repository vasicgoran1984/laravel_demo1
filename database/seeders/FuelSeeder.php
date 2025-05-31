<?php

namespace Database\Seeders;

use App\Models\Fuel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FuelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fuels = [
            "Dizel",
            "Benzin",
            "Plin",
            "Hibrid",
            "Elektro",
        ];

        foreach ($fuels as $fuel) {
            $insert = [
                'name' => $fuel,
            ];
            Fuel::insert($insert);
        }
    }
}
