<?php

namespace Database\Seeders;

use App\Models\ModelTypes;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BmwModelTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modelTypes = [
            '1 Series' => [
                ['name' => '1 Series E81/E82/E87/E88', 'start_year' => 2004, 'end_year' => 2011],
                ['name' => '1 Series F20/F21', 'start_year' => 2011, 'end_year' => 2019],
                ['name' => '1 Series F40', 'start_year' => 2019, 'end_year' => null],
            ],
            '2 Series' => [
                ['name' => '2 Series F22/F23', 'start_year' => 2014, 'end_year' => 2021],
                ['name' => '2 Series G42', 'start_year' => 2021, 'end_year' => null],
                ['name' => '2 Series Active Tourer F45', 'start_year' => 2014, 'end_year' => 2021],
                ['name' => '2 Series Active Tourer U06', 'start_year' => 2021, 'end_year' => null],
            ],
            '3 Series' => [
                ['name' => '3 Series E36', 'start_year' => 1990, 'end_year' => 2000],
                ['name' => '3 Series E46', 'start_year' => 1998, 'end_year' => 2006],
                ['name' => '3 Series E90/E91/E92/E93', 'start_year' => 2005, 'end_year' => 2013],
                ['name' => '3 Series F30/F31/F34', 'start_year' => 2012, 'end_year' => 2019],
                ['name' => '3 Series G20/G21', 'start_year' => 2019, 'end_year' => null],
            ],
            '4 Series' => [
                ['name' => '4 Series F32/F33/F36', 'start_year' => 2013, 'end_year' => 2020],
                ['name' => '4 Series G22/G23/G26', 'start_year' => 2020, 'end_year' => null],
            ],
            '5 Series' => [
                ['name' => '5 Series E39', 'start_year' => 1995, 'end_year' => 2003],
                ['name' => '5 Series E60/E61', 'start_year' => 2003, 'end_year' => 2010],
                ['name' => '5 Series F10/F11', 'start_year' => 2010, 'end_year' => 2017],
                ['name' => '5 Series G30/G31', 'start_year' => 2017, 'end_year' => 2024],
                ['name' => '5 Series G60', 'start_year' => 2024, 'end_year' => null],
            ],
            '7 Series' => [
                ['name' => '7 Series E38', 'start_year' => 1994, 'end_year' => 2001],
                ['name' => '7 Series E65/E66', 'start_year' => 2001, 'end_year' => 2008],
                ['name' => '7 Series F01/F02', 'start_year' => 2008, 'end_year' => 2015],
                ['name' => '7 Series G11/G12', 'start_year' => 2015, 'end_year' => 2022],
                ['name' => '7 Series G70', 'start_year' => 2022, 'end_year' => null],
            ],
            'X1' => [
                ['name' => 'X1 E84', 'start_year' => 2009, 'end_year' => 2015],
                ['name' => 'X1 F48', 'start_year' => 2015, 'end_year' => 2022],
                ['name' => 'X1 U11', 'start_year' => 2022, 'end_year' => null],
            ],
            'X3' => [
                ['name' => 'X3 E83', 'start_year' => 2003, 'end_year' => 2010],
                ['name' => 'X3 F25', 'start_year' => 2010, 'end_year' => 2017],
                ['name' => 'X3 G01', 'start_year' => 2017, 'end_year' => null],
            ],
            'X5' => [
                ['name' => 'X5 E53', 'start_year' => 1999, 'end_year' => 2006],
                ['name' => 'X5 E70', 'start_year' => 2006, 'end_year' => 2013],
                ['name' => 'X5 F15', 'start_year' => 2013, 'end_year' => 2018],
                ['name' => 'X5 G05', 'start_year' => 2018, 'end_year' => null],
            ],
            'X6' => [
                ['name' => 'X6 E71', 'start_year' => 2008, 'end_year' => 2014],
                ['name' => 'X6 F16', 'start_year' => 2014, 'end_year' => 2019],
                ['name' => 'X6 G06', 'start_year' => 2019, 'end_year' => null],
            ],
            'i3' => [
                ['name' => 'i3 I01', 'start_year' => 2013, 'end_year' => 2022],
            ],
            'i4' => [
                ['name' => 'i4 G26', 'start_year' => 2021, 'end_year' => null],
            ],
            'iX' => [
                ['name' => 'iX I20', 'start_year' => 2021, 'end_year' => null],
            ],
        ];

        foreach ($modelTypes as $modelName => $variants) {
            $type = Type::where('name', $modelName)->first();

            if ($type) {
                foreach ($variants as $variant) {
                    ModelTypes::firstOrCreate([
                        'type_id' => $type->id,
                        'name' => $variant['name'],
                        'start_year' => $variant['start_year'],
                        'end_year' => $variant['end_year'],
                    ]);
                }
            }
        }
    }
}
