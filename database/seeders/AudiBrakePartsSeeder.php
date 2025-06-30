<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AudiBrakePartsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Audi A3 8L
        $modelTypeId = DB::table('model_types')->where('name', 'A3 8L')->value('id');

        if (!$modelTypeId) {
            echo "Model A3 8L not found.\n";
            return;
        }

        $parts = [
            'discs' => [
                ['producer' => 'TRW', 'part_number' => 'DF2801', 'position' => 'front'],
                ['producer' => 'TRW', 'part_number' => 'DF1700', 'position' => 'rear'],

                ['producer' => 'Bosch', 'part_number' => '0 986 479 293', 'position' => 'front'],
                ['producer' => 'Bosch', 'part_number' => '0 986 479 758', 'position' => 'rear'],

                ['producer' => 'ATE', 'part_number' => '24.0126-0155.1', 'position' => 'front'],
                ['producer' => 'ATE', 'part_number' => '24.0110-0337.1', 'position' => 'rear'],

                ['producer' => 'Ferodo', 'part_number' => 'DDF1184', 'position' => 'front'],
                ['producer' => 'Ferodo', 'part_number' => 'DDF946', 'position' => 'rear'],

                ['producer' => 'Zimmermann', 'part_number' => '100.1234.20', 'position' => 'front'],
                ['producer' => 'Zimmermann', 'part_number' => '100.4321.20', 'position' => 'rear'],

                ['producer' => 'Textar', 'part_number' => '92012303', 'position' => 'front'],
                ['producer' => 'Textar', 'part_number' => '92012403', 'position' => 'rear'],
            ],
            'pads' => [
                ['producer' => 'TRW', 'part_number' => 'GDB1083', 'position' => 'front'],
                ['producer' => 'TRW', 'part_number' => 'GDB1330', 'position' => 'rear'],

                ['producer' => 'Bosch', 'part_number' => '0 986 424 795', 'position' => 'front'],
                ['producer' => 'Bosch', 'part_number' => '0 986 494 563', 'position' => 'rear'],

                ['producer' => 'ATE', 'part_number' => '13.0460-3852.2', 'position' => 'front'],
                ['producer' => 'ATE', 'part_number' => '13.0460-2781.2', 'position' => 'rear'],

                ['producer' => 'Ferodo', 'part_number' => 'FDB1083', 'position' => 'front'],
                ['producer' => 'Ferodo', 'part_number' => 'FDB1330', 'position' => 'rear'],

                ['producer' => 'Zimmermann', 'part_number' => '20990.120.1', 'position' => 'front'],
                ['producer' => 'Zimmermann', 'part_number' => '20991.120.1', 'position' => 'rear'],

                ['producer' => 'Textar', 'part_number' => '2356101', 'position' => 'front'],
                ['producer' => 'Textar', 'part_number' => '2356102', 'position' => 'rear'],
            ]
        ];

        foreach ($parts['discs'] as $part) {
            $exists = DB::table('brake_parts')->where([
                ['model_type_id', '=', $modelTypeId],
                ['part_group_code', '=', 'DISC'],
                ['producer', '=', $part['producer']],
                ['part_number', '=', $part['part_number']],
                ['position', '=', $part['position']],
            ])->exists();

            if (!$exists) {
                DB::table('brake_parts')->insert([
                    'model_type_id' => $modelTypeId,
                    'part_group_code' => 'DISC',
                    'producer' => $part['producer'],
                    'part_number' => $part['part_number'],
                    'position' => $part['position'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        foreach ($parts['pads'] as $part) {
            $exists = DB::table('brake_parts')->where([
                ['model_type_id', '=', $modelTypeId],
                ['part_group_code', '=', 'PAD'],
                ['producer', '=', $part['producer']],
                ['part_number', '=', $part['part_number']],
                ['position', '=', $part['position']],
            ])->exists();

            if (!$exists) {
                DB::table('brake_parts')->insert([
                    'model_type_id' => $modelTypeId,
                    'part_group_code' => 'PAD',
                    'producer' => $part['producer'],
                    'part_number' => $part['part_number'],
                    'position' => $part['position'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        // Audi A3 8P
        $modelTypeId = DB::table('model_types')->where('name', 'A3 8P')->value('id');

        if (!$modelTypeId) {
            echo "Model A3 8P not found.\n";
            return;
        }

        $parts = [
            'discs' => [
                ['producer' => 'TRW', 'part_number' => 'DF4274', 'position' => 'front'],
                ['producer' => 'TRW', 'part_number' => 'DF4275', 'position' => 'rear'],

                ['producer' => 'Bosch', 'part_number' => '0 986 479 855', 'position' => 'front'],
                ['producer' => 'Bosch', 'part_number' => '0 986 479 854', 'position' => 'rear'],

                ['producer' => 'ATE', 'part_number' => '24.0125-0158.1', 'position' => 'front'],
                ['producer' => 'ATE', 'part_number' => '24.0109-0278.1', 'position' => 'rear'],

                ['producer' => 'Ferodo', 'part_number' => 'DDF1526C', 'position' => 'front'],
                ['producer' => 'Ferodo', 'part_number' => 'DDF1527C', 'position' => 'rear'],

                ['producer' => 'Zimmermann', 'part_number' => '100.3301.20', 'position' => 'front'],
                ['producer' => 'Zimmermann', 'part_number' => '100.3302.20', 'position' => 'rear'],

                ['producer' => 'Textar', 'part_number' => '92136103', 'position' => 'front'],
                ['producer' => 'Textar', 'part_number' => '92136203', 'position' => 'rear'],
            ],
            'pads' => [
                ['producer' => 'TRW', 'part_number' => 'GDB1603', 'position' => 'front'],
                ['producer' => 'TRW', 'part_number' => 'GDB1604', 'position' => 'rear'],

                ['producer' => 'Bosch', 'part_number' => '0 986 494 728', 'position' => 'front'],
                ['producer' => 'Bosch', 'part_number' => '0 986 494 729', 'position' => 'rear'],

                ['producer' => 'ATE', 'part_number' => '13.0460-7117.2', 'position' => 'front'],
                ['producer' => 'ATE', 'part_number' => '13.0460-7118.2', 'position' => 'rear'],

                ['producer' => 'Ferodo', 'part_number' => 'FDB1603', 'position' => 'front'],
                ['producer' => 'Ferodo', 'part_number' => 'FDB1604', 'position' => 'rear'],

                ['producer' => 'Zimmermann', 'part_number' => '20990.180.1', 'position' => 'front'],
                ['producer' => 'Zimmermann', 'part_number' => '20991.180.1', 'position' => 'rear'],

                ['producer' => 'Textar', 'part_number' => '2356401', 'position' => 'front'],
                ['producer' => 'Textar', 'part_number' => '2356402', 'position' => 'rear'],
            ]
        ];

        foreach ($parts['discs'] as $part) {
            $exists = DB::table('brake_parts')->where([
                ['model_type_id', '=', $modelTypeId],
                ['part_group_code', '=', 'DISC'],
                ['producer', '=', $part['producer']],
                ['part_number', '=', $part['part_number']],
                ['position', '=', $part['position']],
            ])->exists();

            if (!$exists) {
                DB::table('brake_parts')->insert([
                    'model_type_id' => $modelTypeId,
                    'part_group_code' => 'DISC',
                    'producer' => $part['producer'],
                    'part_number' => $part['part_number'],
                    'position' => $part['position'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        foreach ($parts['pads'] as $part) {
            $exists = DB::table('brake_parts')->where([
                ['model_type_id', '=', $modelTypeId],
                ['part_group_code', '=', 'PAD'],
                ['producer', '=', $part['producer']],
                ['part_number', '=', $part['part_number']],
                ['position', '=', $part['position']],
            ])->exists();

            if (!$exists) {
                DB::table('brake_parts')->insert([
                    'model_type_id' => $modelTypeId,
                    'part_group_code' => 'PAD',
                    'producer' => $part['producer'],
                    'part_number' => $part['part_number'],
                    'position' => $part['position'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
