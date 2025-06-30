<?php

namespace Database\Seeders;

use App\Models\ModelTypes;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VolkswagenModelTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modelTypes = [
            'Golf' => [
                ['name' => 'Golf 1', 'start_year' => 1974, 'end_year' => 1983],
                ['name' => 'Golf 2', 'start_year' => 1983, 'end_year' => 1992],
                ['name' => 'Golf 3', 'start_year' => 1991, 'end_year' => 1997],
                ['name' => 'Golf 4', 'start_year' => 1997, 'end_year' => 2003],
                ['name' => 'Golf 5', 'start_year' => 2003, 'end_year' => 2008],
                ['name' => 'Golf 6', 'start_year' => 2008, 'end_year' => 2012],
                ['name' => 'Golf 7', 'start_year' => 2012, 'end_year' => 2019],
                ['name' => 'Golf 8', 'start_year' => 2019, 'end_year' => null],
            ],
            'Passat' => [
                ['name' => 'Passat B1', 'start_year' => 1973, 'end_year' => 1981],
                ['name' => 'Passat B2', 'start_year' => 1981, 'end_year' => 1988],
                ['name' => 'Passat B3', 'start_year' => 1988, 'end_year' => 1993],
                ['name' => 'Passat B4', 'start_year' => 1993, 'end_year' => 1997],
                ['name' => 'Passat B5', 'start_year' => 1996, 'end_year' => 2005],
                ['name' => 'Passat B6', 'start_year' => 2005, 'end_year' => 2010],
                ['name' => 'Passat B7', 'start_year' => 2010, 'end_year' => 2014],
                ['name' => 'Passat B8', 'start_year' => 2014, 'end_year' => null],
            ],
            'Polo' => [
                ['name' => 'Polo MK1', 'start_year' => 1975, 'end_year' => 1981],
                ['name' => 'Polo MK2', 'start_year' => 1981, 'end_year' => 1994],
                ['name' => 'Polo MK3', 'start_year' => 1994, 'end_year' => 2002],
                ['name' => 'Polo MK4', 'start_year' => 2002, 'end_year' => 2009],
                ['name' => 'Polo MK5', 'start_year' => 2009, 'end_year' => 2017],
                ['name' => 'Polo MK6', 'start_year' => 2017, 'end_year' => null],
            ],
            'Touran' => [
                ['name' => 'Touran I', 'start_year' => 2003, 'end_year' => 2010],
                ['name' => 'Touran II', 'start_year' => 2010, 'end_year' => 2015],
                ['name' => 'Touran III', 'start_year' => 2015, 'end_year' => null],
            ],
            'Tiguan' => [
                ['name' => 'Tiguan I', 'start_year' => 2007, 'end_year' => 2016],
                ['name' => 'Tiguan II', 'start_year' => 2016, 'end_year' => null],
            ],
            'Touareg' => [
                ['name' => 'Touareg I', 'start_year' => 2002, 'end_year' => 2010],
                ['name' => 'Touareg II', 'start_year' => 2010, 'end_year' => 2018],
                ['name' => 'Touareg III', 'start_year' => 2018, 'end_year' => null],
            ],
            'T-Roc' => [
                ['name' => 'T-Roc I', 'start_year' => 2017, 'end_year' => null],
            ],
            'ID.3' => [
                ['name' => 'ID.3 I', 'start_year' => 2019, 'end_year' => null],
            ],
            'ID.4' => [
                ['name' => 'ID.4 I', 'start_year' => 2020, 'end_year' => null],
            ],
            'Eos' => [
                ['name' => 'Eos', 'start_year' => 2006, 'end_year' => 2015],
            ],
            'CC' => [
                ['name' => 'Passat CC', 'start_year' => 2008, 'end_year' => 2012],
                ['name' => 'CC', 'start_year' => 2012, 'end_year' => 2017],
            ],
            'Jetta' => [
                ['name' => 'Jetta V', 'start_year' => 2005, 'end_year' => 2010],
                ['name' => 'Jetta VI', 'start_year' => 2010, 'end_year' => 2018],
                ['name' => 'Jetta VII', 'start_year' => 2018, 'end_year' => null],
            ],
            'Beetle' => [
                ['name' => 'New Beetle', 'start_year' => 1997, 'end_year' => 2011],
                ['name' => 'Beetle A5', 'start_year' => 2011, 'end_year' => 2019],
            ],
            'Scirocco' => [
                ['name' => 'Scirocco I', 'start_year' => 1974, 'end_year' => 1981],
                ['name' => 'Scirocco II', 'start_year' => 1981, 'end_year' => 1992],
                ['name' => 'Scirocco III', 'start_year' => 2008, 'end_year' => 2017],
            ],
            'Sharan' => [
                ['name' => 'Sharan I', 'start_year' => 1995, 'end_year' => 2010],
                ['name' => 'Sharan II', 'start_year' => 2010, 'end_year' => 2022],
            ],
            'Multivan' => [
                ['name' => 'T4', 'start_year' => 1990, 'end_year' => 2003],
                ['name' => 'T5', 'start_year' => 2003, 'end_year' => 2015],
                ['name' => 'T6', 'start_year' => 2015, 'end_year' => 2022],
                ['name' => 'T7', 'start_year' => 2022, 'end_year' => null],
            ],
            'Caddy' => [
                ['name' => 'Caddy III', 'start_year' => 2004, 'end_year' => 2020],
                ['name' => 'Caddy IV', 'start_year' => 2020, 'end_year' => null],
            ],
            'Amarok' => [
                ['name' => 'Amarok I', 'start_year' => 2010, 'end_year' => 2022],
                ['name' => 'Amarok II', 'start_year' => 2022, 'end_year' => null],
            ],
            'Arteon' => [
                ['name' => 'Arteon I', 'start_year' => 2017, 'end_year' => null],
            ],
        ];

        foreach ($modelTypes as $modelName => $variants) {
            $type = Type::where('name', $modelName)->first();

            if ($type) {
                foreach ($variants as $variant) {
                    ModelTypes::updateOrCreate([
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
