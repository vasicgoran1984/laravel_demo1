<?php

namespace Database\Seeders;

use App\Models\ModelTypes;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AudiModelTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modelTypes = [
            'A1' => [
                ['name' => 'A1 8X', 'start_year' => 2010, 'end_year' => 2018],
                ['name' => 'A1 GB', 'start_year' => 2018, 'end_year' => null],
            ],
            'A2' => [
                ['name' => 'A2 8Z', 'start_year' => 1999, 'end_year' => 2005],
            ],
            'A3' => [
                ['name' => 'A3 8L', 'start_year' => 1996, 'end_year' => 2003],
                ['name' => 'A3 8P', 'start_year' => 2003, 'end_year' => 2012],
                ['name' => 'A3 8V', 'start_year' => 2012, 'end_year' => 2020],
                ['name' => 'A3 8Y', 'start_year' => 2020, 'end_year' => null],
            ],
            'A4' => [
                ['name' => 'A4 B5', 'start_year' => 1994, 'end_year' => 2001],
                ['name' => 'A4 B6', 'start_year' => 2000, 'end_year' => 2006],
                ['name' => 'A4 B7', 'start_year' => 2004, 'end_year' => 2008],
                ['name' => 'A4 B8', 'start_year' => 2007, 'end_year' => 2015],
                ['name' => 'A4 B9', 'start_year' => 2015, 'end_year' => null],
            ],
            'A5' => [
                ['name' => 'A5 8T', 'start_year' => 2007, 'end_year' => 2016],
                ['name' => 'A5 F5', 'start_year' => 2016, 'end_year' => null],
            ],
            'A6' => [
                ['name' => 'A6 C4', 'start_year' => 1994, 'end_year' => 1997],
                ['name' => 'A6 C5', 'start_year' => 1997, 'end_year' => 2004],
                ['name' => 'A6 C6', 'start_year' => 2004, 'end_year' => 2011],
                ['name' => 'A6 C7', 'start_year' => 2011, 'end_year' => 2018],
                ['name' => 'A6 C8', 'start_year' => 2018, 'end_year' => null],
            ],
            'A7' => [
                ['name' => 'A7 4G8', 'start_year' => 2010, 'end_year' => 2017],
                ['name' => 'A7 4K8', 'start_year' => 2018, 'end_year' => null],
            ],
            'A8' => [
                ['name' => 'A8 D2', 'start_year' => 1994, 'end_year' => 2002],
                ['name' => 'A8 D3', 'start_year' => 2002, 'end_year' => 2009],
                ['name' => 'A8 D4', 'start_year' => 2009, 'end_year' => 2017],
                ['name' => 'A8 D5', 'start_year' => 2017, 'end_year' => null],
            ],
            'Q3' => [
                ['name' => 'Q3 8U', 'start_year' => 2011, 'end_year' => 2018],
                ['name' => 'Q3 F3', 'start_year' => 2018, 'end_year' => null],
            ],
            'Q4' => [
                ['name' => 'Q4 e-tron', 'start_year' => 2021, 'end_year' => null],
            ],
            'Q5' => [
                ['name' => 'Q5 8R', 'start_year' => 2008, 'end_year' => 2017],
                ['name' => 'Q5 FY', 'start_year' => 2017, 'end_year' => null],
            ],
            'Q7' => [
                ['name' => 'Q7 4L', 'start_year' => 2005, 'end_year' => 2015],
                ['name' => 'Q7 4M', 'start_year' => 2015, 'end_year' => null],
            ],
            'Q8' => [
                ['name' => 'Q8 4M8', 'start_year' => 2018, 'end_year' => null],
            ],
            'R8' => [
                ['name' => 'R8 Type 42', 'start_year' => 2006, 'end_year' => 2015],
                ['name' => 'R8 Type 4S', 'start_year' => 2015, 'end_year' => 2023],
            ],
            'TT' => [
                ['name' => 'TT 8N', 'start_year' => 1998, 'end_year' => 2006],
                ['name' => 'TT 8J', 'start_year' => 2006, 'end_year' => 2014],
                ['name' => 'TT FV/8S', 'start_year' => 2014, 'end_year' => 2023],
            ],
            'e-tron' => [
                ['name' => 'e-tron SUV GE', 'start_year' => 2018, 'end_year' => null],
            ],
            'e-tron GT' => [
                ['name' => 'e-tron GT J1', 'start_year' => 2021, 'end_year' => null],
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
