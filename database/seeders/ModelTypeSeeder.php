<?php

namespace Database\Seeders;

use App\Models\ModelTypes;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModelTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modelTypes = [
            // Volkswagen
            'Golf' => [
                ['name' => 'Golf 1 MK1', 'start_year' => 1974, 'end_year' => 1983],
                ['name' => 'Golf 2 MK2', 'start_year' => 1983, 'end_year' => 1992],
                ['name' => 'Golf 3 MK3', 'start_year' => 1991, 'end_year' => 1999],
                ['name' => 'Golf 4 MK4', 'start_year' => 1997, 'end_year' => 2003],
                ['name' => 'Golf 5 MK5', 'start_year' => 2003, 'end_year' => 2008],
                ['name' => 'Golf 6 MK6', 'start_year' => 2008, 'end_year' => 2012],
                ['name' => 'Golf 7 MK7', 'start_year' => 2012, 'end_year' => 2019],
                ['name' => 'Golf 8 MK8', 'start_year' => 2019, 'end_year' => null],
            ],
            'Passat' => [
                ['name' => 'Passat B1', 'start_year' => 1973, 'end_year' => 1981],
                ['name' => 'Passat B2', 'start_year' => 1981, 'end_year' => 1988],
                ['name' => 'Passat B3', 'start_year' => 1988, 'end_year' => 1993],
                ['name' => 'Passat B4', 'start_year' => 1993, 'end_year' => 1996],
                ['name' => 'Passat B5', 'start_year' => 1996, 'end_year' => 2005],
                ['name' => 'Passat B6', 'start_year' => 2005, 'end_year' => 2010],
                ['name' => 'Passat B7', 'start_year' => 2010, 'end_year' => 2014],
                ['name' => 'Passat B8', 'start_year' => 2014, 'end_year' => null],
            ],
            'Polo' => [
                ['name' => 'Polo MK3 6N', 'start_year' => 1994, 'end_year' => 2001],
                ['name' => 'Polo MK4 9N', 'start_year' => 2001, 'end_year' => 2009],
                ['name' => 'Polo MK5 6R', 'start_year' => 2009, 'end_year' => 2017],
                ['name' => 'Polo MK6 AW', 'start_year' => 2017, 'end_year' => null],
            ],

            // BMW
            '3 Series' => [
                ['name' => 'E21', 'start_year' => 1975, 'end_year' => 1983],
                ['name' => 'E30', 'start_year' => 1982, 'end_year' => 1994],
                ['name' => 'E36', 'start_year' => 1990, 'end_year' => 2000],
                ['name' => 'E46', 'start_year' => 1998, 'end_year' => 2006],
                ['name' => 'E90/E91/E92/E93', 'start_year' => 2005, 'end_year' => 2013],
                ['name' => 'F30/F31/F34', 'start_year' => 2012, 'end_year' => 2019],
                ['name' => 'G20/G21', 'start_year' => 2019, 'end_year' => null],
            ],
            '5 Series' => [
                ['name' => 'E12', 'start_year' => 1972, 'end_year' => 1981],
                ['name' => 'E28', 'start_year' => 1981, 'end_year' => 1988],
                ['name' => 'E34', 'start_year' => 1988, 'end_year' => 1996],
                ['name' => 'E39', 'start_year' => 1995, 'end_year' => 2003],
                ['name' => 'E60', 'start_year' => 2003, 'end_year' => 2010],
                ['name' => 'F10', 'start_year' => 2010, 'end_year' => 2017],
                ['name' => 'G30', 'start_year' => 2017, 'end_year' => null],
            ],

            // Mercedes-Benz
            'C-Class' => [
                ['name' => 'W202', 'start_year' => 1993, 'end_year' => 2000],
                ['name' => 'W203', 'start_year' => 2000, 'end_year' => 2007],
                ['name' => 'W204', 'start_year' => 2007, 'end_year' => 2014],
                ['name' => 'W205', 'start_year' => 2014, 'end_year' => 2021],
                ['name' => 'W206', 'start_year' => 2021, 'end_year' => null],
            ],
            'E-Class' => [
                ['name' => 'W210', 'start_year' => 1995, 'end_year' => 2003],
                ['name' => 'W211', 'start_year' => 2002, 'end_year' => 2009],
                ['name' => 'W212', 'start_year' => 2009, 'end_year' => 2016],
                ['name' => 'W213', 'start_year' => 2016, 'end_year' => 2023],
                ['name' => 'W214', 'start_year' => 2023, 'end_year' => null],
            ],

            // Peugeot
            '206' => [
                ['name' => '206', 'start_year' => 1998, 'end_year' => 2012],
            ],
            '207' => [
                ['name' => '207', 'start_year' => 2006, 'end_year' => 2014],
            ],
            '208' => [
                ['name' => '208 I', 'start_year' => 2012, 'end_year' => 2019],
                ['name' => '208 II', 'start_year' => 2019, 'end_year' => null],
            ],
            '308' => [
                ['name' => '308 I T7', 'start_year' => 2007, 'end_year' => 2013],
                ['name' => '308 II T9', 'start_year' => 2013, 'end_year' => 2021],
                ['name' => '308 III P5', 'start_year' => 2021, 'end_year' => null],
            ],

            // Renault
            'Clio' => [
                ['name' => 'Clio I', 'start_year' => 1990, 'end_year' => 1998],
                ['name' => 'Clio II', 'start_year' => 1998, 'end_year' => 2012],
                ['name' => 'Clio III', 'start_year' => 2005, 'end_year' => 2014],
                ['name' => 'Clio IV', 'start_year' => 2012, 'end_year' => 2019],
                ['name' => 'Clio V', 'start_year' => 2019, 'end_year' => null],
            ],
            'Megane' => [
                ['name' => 'Megane I', 'start_year' => 1995, 'end_year' => 2002],
                ['name' => 'Megane II', 'start_year' => 2002, 'end_year' => 2009],
                ['name' => 'Megane III', 'start_year' => 2008, 'end_year' => 2016],
                ['name' => 'Megane IV', 'start_year' => 2016, 'end_year' => 2022],
                ['name' => 'Megane E-Tech', 'start_year' => 2022, 'end_year' => null],
            ],

            // Opel
            'Astra' => [
                ['name' => 'Astra F', 'start_year' => 1991, 'end_year' => 1998],
                ['name' => 'Astra G', 'start_year' => 1998, 'end_year' => 2004],
                ['name' => 'Astra H', 'start_year' => 2004, 'end_year' => 2010],
                ['name' => 'Astra J', 'start_year' => 2009, 'end_year' => 2015],
                ['name' => 'Astra K', 'start_year' => 2015, 'end_year' => 2021],
                ['name' => 'Astra L', 'start_year' => 2021, 'end_year' => null],
            ],
            'Corsa' => [
                ['name' => 'Corsa B', 'start_year' => 1993, 'end_year' => 2000],
                ['name' => 'Corsa C', 'start_year' => 2000, 'end_year' => 2006],
                ['name' => 'Corsa D', 'start_year' => 2006, 'end_year' => 2014],
                ['name' => 'Corsa E', 'start_year' => 2014, 'end_year' => 2019],
                ['name' => 'Corsa F', 'start_year' => 2019, 'end_year' => null],
            ],
        ];

        foreach ($modelTypes as $typeName => $variants) {
            $type = Type::where('name', $typeName)->first();

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
