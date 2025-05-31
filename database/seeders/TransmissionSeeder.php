<?php

namespace Database\Seeders;

use App\Models\Transmission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transmissions = [
            "Manuelni",
            "Automatik",
        ];

        foreach ($transmissions as $tansmission) {
            $insert = [
                'name' => $tansmission,
            ];
            Transmission::insert($insert);
        }
    }
}
