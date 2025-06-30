<?php

namespace Database\Seeders;

use App\Models\ModelTypes;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MercedesModelTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modelTypes = [
            'A-Class' => [
                ['name' => 'A-Class W168', 'start_year' => 1997, 'end_year' => 2004],
                ['name' => 'A-Class W169', 'start_year' => 2004, 'end_year' => 2012],
                ['name' => 'A-Class W176', 'start_year' => 2012, 'end_year' => 2018],
                ['name' => 'A-Class W177', 'start_year' => 2018, 'end_year' => null],
            ],
            'B-Class' => [
                ['name' => 'B-Class W245', 'start_year' => 2005, 'end_year' => 2011],
                ['name' => 'B-Class W246', 'start_year' => 2011, 'end_year' => 2018],
                ['name' => 'B-Class W247', 'start_year' => 2018, 'end_year' => null],
            ],
            'C-Class' => [
                ['name' => 'C-Class W202', 'start_year' => 1993, 'end_year' => 2000],
                ['name' => 'C-Class W203', 'start_year' => 2000, 'end_year' => 2007],
                ['name' => 'C-Class W204', 'start_year' => 2007, 'end_year' => 2014],
                ['name' => 'C-Class W205', 'start_year' => 2014, 'end_year' => 2021],
                ['name' => 'C-Class W206', 'start_year' => 2021, 'end_year' => null],
            ],
            'E-Class' => [
                ['name' => 'E-Class W210', 'start_year' => 1995, 'end_year' => 2002],
                ['name' => 'E-Class W211', 'start_year' => 2002, 'end_year' => 2009],
                ['name' => 'E-Class W212', 'start_year' => 2009, 'end_year' => 2016],
                ['name' => 'E-Class W213', 'start_year' => 2016, 'end_year' => 2023],
                ['name' => 'E-Class W214', 'start_year' => 2023, 'end_year' => null],
            ],
            'S-Class' => [
                ['name' => 'S-Class W140', 'start_year' => 1991, 'end_year' => 1998],
                ['name' => 'S-Class W220', 'start_year' => 1998, 'end_year' => 2005],
                ['name' => 'S-Class W221', 'start_year' => 2005, 'end_year' => 2013],
                ['name' => 'S-Class W222', 'start_year' => 2013, 'end_year' => 2020],
                ['name' => 'S-Class W223', 'start_year' => 2020, 'end_year' => null],
            ],
            'CLA' => [
                ['name' => 'CLA C117', 'start_year' => 2013, 'end_year' => 2019],
                ['name' => 'CLA C118', 'start_year' => 2019, 'end_year' => null],
            ],
            'CLS' => [
                ['name' => 'CLS C219', 'start_year' => 2004, 'end_year' => 2010],
                ['name' => 'CLS C218', 'start_year' => 2010, 'end_year' => 2018],
                ['name' => 'CLS C257', 'start_year' => 2018, 'end_year' => null],
            ],
            'GLA' => [
                ['name' => 'GLA X156', 'start_year' => 2013, 'end_year' => 2020],
                ['name' => 'GLA H247', 'start_year' => 2020, 'end_year' => null],
            ],
            'GLC' => [
                ['name' => 'GLC X253', 'start_year' => 2015, 'end_year' => 2022],
                ['name' => 'GLC X254', 'start_year' => 2022, 'end_year' => null],
            ],
            'GLE' => [
                ['name' => 'GLE W166', 'start_year' => 2015, 'end_year' => 2019],
                ['name' => 'GLE W167', 'start_year' => 2019, 'end_year' => null],
            ],
            'GLS' => [
                ['name' => 'GLS X166', 'start_year' => 2016, 'end_year' => 2019],
                ['name' => 'GLS X167', 'start_year' => 2019, 'end_year' => null],
            ],
            'G-Class' => [
                ['name' => 'G-Class W460', 'start_year' => 1979, 'end_year' => 1991],
                ['name' => 'G-Class W463', 'start_year' => 1990, 'end_year' => 2018],
                ['name' => 'G-Class W464', 'start_year' => 2018, 'end_year' => null],
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
