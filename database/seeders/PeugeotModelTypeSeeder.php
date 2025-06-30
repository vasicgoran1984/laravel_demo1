<?php

namespace Database\Seeders;

use App\Models\ModelTypes;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeugeotModelTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modelTypes = [
            '106' => [
                ['name' => '106 I', 'start_year' => 1991, 'end_year' => 1996],
                ['name' => '106 II', 'start_year' => 1996, 'end_year' => 2003],
            ],
            '107' => [
                ['name' => '107', 'start_year' => 2005, 'end_year' => 2014],
            ],
            '108' => [
                ['name' => '108', 'start_year' => 2014, 'end_year' => 2021],
            ],
            '205' => [
                ['name' => '205', 'start_year' => 1983, 'end_year' => 1998],
            ],
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
            '306' => [
                ['name' => '306', 'start_year' => 1993, 'end_year' => 2002],
            ],
            '307' => [
                ['name' => '307', 'start_year' => 2001, 'end_year' => 2009],
            ],
            '308' => [
                ['name' => '308 I (T7)', 'start_year' => 2007, 'end_year' => 2013],
                ['name' => '308 II (T9)', 'start_year' => 2013, 'end_year' => 2021],
                ['name' => '308 III (P5)', 'start_year' => 2021, 'end_year' => null],
            ],
            '406' => [
                ['name' => '406', 'start_year' => 1995, 'end_year' => 2004],
            ],
            '407' => [
                ['name' => '407', 'start_year' => 2004, 'end_year' => 2011],
            ],
            '508' => [
                ['name' => '508 I', 'start_year' => 2010, 'end_year' => 2018],
                ['name' => '508 II', 'start_year' => 2018, 'end_year' => null],
            ],
            '2008' => [
                ['name' => '2008 I', 'start_year' => 2013, 'end_year' => 2019],
                ['name' => '2008 II', 'start_year' => 2019, 'end_year' => null],
            ],
            '3008' => [
                ['name' => '3008 I', 'start_year' => 2009, 'end_year' => 2016],
                ['name' => '3008 II', 'start_year' => 2016, 'end_year' => 2024],
                ['name' => '3008 III', 'start_year' => 2024, 'end_year' => null],
            ],
            '5008' => [
                ['name' => '5008 I', 'start_year' => 2009, 'end_year' => 2016],
                ['name' => '5008 II', 'start_year' => 2017, 'end_year' => null],
            ],
            'RCZ' => [
                ['name' => 'RCZ', 'start_year' => 2010, 'end_year' => 2015],
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
