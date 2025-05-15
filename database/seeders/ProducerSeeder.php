<?php

namespace Database\Seeders;

use App\Models\Producer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProducerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $producers = [
            "Alfa Romeo",
            "Aston Martin",
            "Audi",
            "Bentley",
            "BMW",
            "Bugatti",
            "Cadillac",
            "Chevrolet",
            "Chrysler",
            "Citroën",
            "Dacia",
            "Daewoo",
            "Dodge",
            "DS",
            "Ferrari",
            "Fiat",
            "Ford",
            "Honda",
            "Hummer",
            "Hyundai",
            "Iveco",
            "Jaguar",
            "Jeep",
            "Kia",
            "KTM",
            "Lada",
            "Lamborghini",
            "Lancia",
            "Land Rover",
            "Lexus",
            "Lotus",
            "Maserati",
            "Mazda",
            "Mercedes-Benz",
            "MG",
            "Mini",
            "Mitsubishi",
            "Morgan",
            "Nissan",
            "Opel",
            "Peugeot",
            "Porsche",
            "Renault",
            "Rover",
            "Saab",
            "Seat",
            "Skoda",
            "Smart",
            "Subaru",
            "Suzuki",
            "Tesla",
            "Toyota",
            "Volkswagen",
            "Volvo"
        ];

        foreach ($producers as $producer) {
            $insert = [
                'name' => $producer,
            ];
            Producer::insert($insert);
        }
    }
}
