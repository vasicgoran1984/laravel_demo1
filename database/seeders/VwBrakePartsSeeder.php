<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VwBrakePartsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $modelTypeId = DB::table('model_types')->where('name', 'Golf 4')->value('id');

        $parts = [
            'discs' => [
                ['producer' => 'TRW', 'part_number' => 'DF2801', 'position' => 'front'],
                ['producer' => 'TRW', 'part_number' => 'DF1740', 'position' => 'front'],
                ['producer' => 'TRW', 'part_number' => 'DF2800', 'position' => 'front'],
                ['producer' => 'TRW', 'part_number' => 'DF1700', 'position' => 'rear'],
                ['producer' => 'TRW', 'part_number' => 'DF4288', 'position' => 'rear'],

                ['producer' => 'Bosch', 'part_number' => '0 986 478 913', 'position' => 'front'],
                ['producer' => 'Bosch', 'part_number' => '0 986 479 528', 'position' => 'front'],
                ['producer' => 'Bosch', 'part_number' => '0 986 479 694', 'position' => 'front'],
                ['producer' => 'Bosch', 'part_number' => '0 986 479 758', 'position' => 'rear'],
                ['producer' => 'Bosch', 'part_number' => '0 986 479 748', 'position' => 'rear'],

                ['producer' => 'ATE', 'part_number' => '24.0126-0155.1', 'position' => 'front'],
                ['producer' => 'ATE', 'part_number' => '24.0126-0169.1', 'position' => 'front'],
                ['producer' => 'ATE', 'part_number' => '24.0126-0176.1', 'position' => 'front'],
                ['producer' => 'ATE', 'part_number' => '24.0112-0165.1', 'position' => 'rear'],
                ['producer' => 'ATE', 'part_number' => '24.0110-0337.1', 'position' => 'rear'],

                ['producer' => 'Ferodo', 'part_number' => 'DDF1210', 'position' => 'front'],
                ['producer' => 'Ferodo', 'part_number' => 'DDF1116', 'position' => 'front'],
                ['producer' => 'Ferodo', 'part_number' => 'DDF1522', 'position' => 'front'],
                ['producer' => 'Ferodo', 'part_number' => 'DDF1252', 'position' => 'rear'],
                ['producer' => 'Ferodo', 'part_number' => 'DDF1254', 'position' => 'rear'],

                ['producer' => 'Zimmermann', 'part_number' => '100.1233.20', 'position' => 'front'],
                ['producer' => 'Zimmermann', 'part_number' => '100.3304.52', 'position' => 'front'],
                ['producer' => 'Zimmermann', 'part_number' => '100.3345.52', 'position' => 'front'],
                ['producer' => 'Zimmermann', 'part_number' => '100.1234.20', 'position' => 'rear'],
                ['producer' => 'Zimmermann', 'part_number' => '100.3310.20', 'position' => 'rear'],

                ['producer' => 'Textar', 'part_number' => '92132300', 'position' => 'front'],
                ['producer' => 'Textar', 'part_number' => '92140700', 'position' => 'front'],
                ['producer' => 'Textar', 'part_number' => '92140800', 'position' => 'front'],
                ['producer' => 'Textar', 'part_number' => '92095600', 'position' => 'rear'],
                ['producer' => 'Textar', 'part_number' => '92095500', 'position' => 'rear'],
            ],
            'pads' => [
                ['producer' => 'TRW', 'part_number' => 'GDB1386', 'position' => 'front'],
                ['producer' => 'TRW', 'part_number' => 'GDB1044', 'position' => 'front'],
                ['producer' => 'TRW', 'part_number' => 'GDB1083', 'position' => 'front'],
                ['producer' => 'TRW', 'part_number' => 'GDB1330', 'position' => 'rear'],
                ['producer' => 'TRW', 'part_number' => 'GDB1332', 'position' => 'rear'],

                ['producer' => 'Bosch', 'part_number' => '0 986 424 795', 'position' => 'front'],
                ['producer' => 'Bosch', 'part_number' => '0 986 424 699', 'position' => 'front'],
                ['producer' => 'Bosch', 'part_number' => '0 986 424 668', 'position' => 'front'],
                ['producer' => 'Bosch', 'part_number' => '0 986 494 563', 'position' => 'rear'],
                ['producer' => 'Bosch', 'part_number' => '0 986 424 624', 'position' => 'rear'],

                ['producer' => 'ATE', 'part_number' => '13.0460-3852.2', 'position' => 'front'],
                ['producer' => 'ATE', 'part_number' => '13.0460-2746.2', 'position' => 'front'],
                ['producer' => 'ATE', 'part_number' => '13.0460-2747.2', 'position' => 'front'],
                ['producer' => 'ATE', 'part_number' => '13.0460-2780.2', 'position' => 'rear'],
                ['producer' => 'ATE', 'part_number' => '13.0460-2781.2', 'position' => 'rear'],

                ['producer' => 'Ferodo', 'part_number' => 'FDB1080', 'position' => 'front'],
                ['producer' => 'Ferodo', 'part_number' => 'FDB762',  'position' => 'front'],
                ['producer' => 'Ferodo', 'part_number' => 'FDB773',  'position' => 'front'],
                ['producer' => 'Ferodo', 'part_number' => 'FDB1330', 'position' => 'rear'],
                ['producer' => 'Ferodo', 'part_number' => 'FDB1332', 'position' => 'rear'],

                ['producer' => 'Zimmermann', 'part_number' => '20958.170.1', 'position' => 'front'],
                ['producer' => 'Zimmermann', 'part_number' => '20961.170.1', 'position' => 'rear'],

                ['producer' => 'Textar', 'part_number' => '2355401', 'position' => 'front'],
                ['producer' => 'Textar', 'part_number' => '2323701', 'position' => 'front'],
                ['producer' => 'Textar', 'part_number' => '2323902', 'position' => 'front'],
                ['producer' => 'Textar', 'part_number' => '2355402', 'position' => 'rear'],
                ['producer' => 'Textar', 'part_number' => '2355403', 'position' => 'rear'],
            ]
        ];

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

        // Golf 5

        $modelTypeId = DB::table('model_types')->where('name', 'Golf 5')->value('id');

        $parts = [
            'discs' => [
                ['producer' => 'TRW', 'part_number' => 'DF2801', 'position' => 'front'],
                ['producer' => 'TRW', 'part_number' => 'DF1700', 'position' => 'rear'],
                ['producer' => 'Bosch', 'part_number' => '0 986 479 293', 'position' => 'front'],
                ['producer' => 'Bosch', 'part_number' => '0 986 479 652', 'position' => 'rear'],
                ['producer' => 'ATE', 'part_number' => '24.0112-0237.1', 'position' => 'front'],
                ['producer' => 'ATE', 'part_number' => '24.0126-0176.1', 'position' => 'rear'],
                ['producer' => 'Ferodo', 'part_number' => 'DDF1220', 'position' => 'front'],
                ['producer' => 'Ferodo', 'part_number' => 'DDF1593', 'position' => 'rear'],
                ['producer' => 'Zimmermann', 'part_number' => '100.1233.20', 'position' => 'front'],
                ['producer' => 'Zimmermann', 'part_number' => '100.1234.20', 'position' => 'rear'],
                ['producer' => 'Textar', 'part_number' => '92140700', 'position' => 'front'],
                ['producer' => 'Textar', 'part_number' => '92095600', 'position' => 'rear'],
            ],
            'pads' => [
                ['producer' => 'TRW', 'part_number' => 'GDB1330', 'position' => 'front'],
                ['producer' => 'TRW', 'part_number' => 'GDB1332', 'position' => 'rear'],
                ['producer' => 'Bosch', 'part_number' => '0 986 494 563', 'position' => 'front'],
                ['producer' => 'Bosch', 'part_number' => '0 986 424 537', 'position' => 'rear'],
                ['producer' => 'ATE', 'part_number' => '13.0460-7184.2', 'position' => 'front'],
                ['producer' => 'ATE', 'part_number' => '13.0460-7117.2', 'position' => 'rear'],
                ['producer' => 'Ferodo', 'part_number' => 'FDB1930', 'position' => 'front'],
                ['producer' => 'Ferodo', 'part_number' => 'FDB1620', 'position' => 'rear'],
                ['producer' => 'Zimmermann', 'part_number' => '20958.170.1', 'position' => 'front'],
                ['producer' => 'Zimmermann', 'part_number' => '20961.170.1', 'position' => 'rear'],
                ['producer' => 'Textar', 'part_number' => '2355401', 'position' => 'front'],
                ['producer' => 'Textar', 'part_number' => '2355402', 'position' => 'rear'],
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

        // Passat B5
        $modelTypeId = DB::table('model_types')->where('name', 'Passat B5')->value('id');

        $parts = [
            'discs' => [
                ['producer' => 'TRW', 'part_number' => 'DF2802', 'position' => 'front'],
                ['producer' => 'TRW', 'part_number' => 'DF2803', 'position' => 'rear'],
                ['producer' => 'Bosch', 'part_number' => '0 986 479 293', 'position' => 'front'],
                ['producer' => 'Bosch', 'part_number' => '0 986 479 564', 'position' => 'rear'],
                ['producer' => 'ATE', 'part_number' => '24.0126-0123.1', 'position' => 'front'],
                ['producer' => 'ATE', 'part_number' => '24.0112-0123.1', 'position' => 'rear'],
                ['producer' => 'Textar', 'part_number' => '92112203', 'position' => 'front'],
                ['producer' => 'Zimmermann', 'part_number' => '100.1235.20', 'position' => 'rear'],
            ],
            'pads' => [
                ['producer' => 'TRW', 'part_number' => 'GDB1331', 'position' => 'front'],
                ['producer' => 'TRW', 'part_number' => 'GDB1332', 'position' => 'rear'],
                ['producer' => 'Bosch', 'part_number' => '0 986 424 556', 'position' => 'front'],
                ['producer' => 'Bosch', 'part_number' => '0 986 494 556', 'position' => 'rear'],
                ['producer' => 'ATE', 'part_number' => '13.0460-2747.2', 'position' => 'front'],
                ['producer' => 'ATE', 'part_number' => '13.0460-2781.2', 'position' => 'rear'],
                ['producer' => 'Textar', 'part_number' => '2355401', 'position' => 'front'],
                ['producer' => 'Zimmermann', 'part_number' => '20961.170.1', 'position' => 'rear'],
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

        // Passat B6
        $modelTypeId = DB::table('model_types')->where('name', 'Passat B6')->value('id');

        $parts = [
            'discs' => [
                ['producer' => 'TRW', 'part_number' => 'DF2805', 'position' => 'front'],
                ['producer' => 'TRW', 'part_number' => 'DF4289', 'position' => 'rear'],

                ['producer' => 'Bosch', 'part_number' => '0 986 479 049', 'position' => 'front'],
                ['producer' => 'Bosch', 'part_number' => '0 986 479 361', 'position' => 'rear'],

                ['producer' => 'ATE', 'part_number' => '24.0126-0173.1', 'position' => 'front'],
                ['producer' => 'ATE', 'part_number' => '24.0112-0217.1', 'position' => 'rear'],

                ['producer' => 'Ferodo', 'part_number' => 'DDF1212', 'position' => 'front'],
                ['producer' => 'Ferodo', 'part_number' => 'DDF1254', 'position' => 'rear'],

                ['producer' => 'Zimmermann', 'part_number' => '100.3346.20', 'position' => 'front'],
                ['producer' => 'Zimmermann', 'part_number' => '100.3311.20', 'position' => 'rear'],

                ['producer' => 'Textar', 'part_number' => '92140803', 'position' => 'front'],
                ['producer' => 'Textar', 'part_number' => '92095601', 'position' => 'rear'],
            ],
            'pads' => [
                ['producer' => 'TRW', 'part_number' => 'GDB1387', 'position' => 'front'],
                ['producer' => 'TRW', 'part_number' => 'GDB1332', 'position' => 'rear'],

                ['producer' => 'Bosch', 'part_number' => '0 986 424 796', 'position' => 'front'],
                ['producer' => 'Bosch', 'part_number' => '0 986 424 625', 'position' => 'rear'],

                ['producer' => 'ATE', 'part_number' => '13.0460-7117.2', 'position' => 'front'],
                ['producer' => 'ATE', 'part_number' => '13.0460-2781.2', 'position' => 'rear'],

                ['producer' => 'Ferodo', 'part_number' => 'FDB1333', 'position' => 'front'],
                ['producer' => 'Ferodo', 'part_number' => 'FDB1332', 'position' => 'rear'],

                ['producer' => 'Zimmermann', 'part_number' => '20959.170.1', 'position' => 'front'],
                ['producer' => 'Zimmermann', 'part_number' => '20961.170.1', 'position' => 'rear'],

                ['producer' => 'Textar', 'part_number' => '2355404', 'position' => 'front'],
                ['producer' => 'Textar', 'part_number' => '2355405', 'position' => 'rear'],
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

        // Passat B7
        $modelTypeId = DB::table('model_types')->where('name', 'Passat B7')->value('id');

        $parts = [
            'discs' => [
                ['producer' => 'TRW', 'part_number' => 'DF6376', 'position' => 'front'],
                ['producer' => 'TRW', 'part_number' => 'DF4347', 'position' => 'rear'],

                ['producer' => 'Bosch', 'part_number' => '0 986 479 534', 'position' => 'front'],
                ['producer' => 'Bosch', 'part_number' => '0 986 479 413', 'position' => 'rear'],

                ['producer' => 'ATE', 'part_number' => '24.0126-0252.1', 'position' => 'front'],
                ['producer' => 'ATE', 'part_number' => '24.0112-0325.1', 'position' => 'rear'],

                ['producer' => 'Ferodo', 'part_number' => 'DDF1524', 'position' => 'front'],
                ['producer' => 'Ferodo', 'part_number' => 'DDF1548', 'position' => 'rear'],

                ['producer' => 'Zimmermann', 'part_number' => '100.3338.20', 'position' => 'front'],
                ['producer' => 'Zimmermann', 'part_number' => '100.3320.20', 'position' => 'rear'],

                ['producer' => 'Textar', 'part_number' => '92211603', 'position' => 'front'],
                ['producer' => 'Textar', 'part_number' => '92195501', 'position' => 'rear'],
            ],
            'pads' => [
                ['producer' => 'TRW', 'part_number' => 'GDB1760', 'position' => 'front'],
                ['producer' => 'TRW', 'part_number' => 'GDB1761', 'position' => 'rear'],

                ['producer' => 'Bosch', 'part_number' => '0 986 494 604', 'position' => 'front'],
                ['producer' => 'Bosch', 'part_number' => '0 986 494 535', 'position' => 'rear'],

                ['producer' => 'ATE', 'part_number' => '13.0460-7265.2', 'position' => 'front'],
                ['producer' => 'ATE', 'part_number' => '13.0460-7232.2', 'position' => 'rear'],

                ['producer' => 'Ferodo', 'part_number' => 'FDB1760', 'position' => 'front'],
                ['producer' => 'Ferodo', 'part_number' => 'FDB1761', 'position' => 'rear'],

                ['producer' => 'Zimmermann', 'part_number' => '20985.170.1', 'position' => 'front'],
                ['producer' => 'Zimmermann', 'part_number' => '20986.170.1', 'position' => 'rear'],

                ['producer' => 'Textar', 'part_number' => '2355406', 'position' => 'front'],
                ['producer' => 'Textar', 'part_number' => '2355407', 'position' => 'rear'],
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

        // Passat B8
        $modelTypeId = DB::table('model_types')->where('name', 'Passat B8')->value('id');

        $parts = [
            'discs' => [
                ['producer' => 'TRW', 'part_number' => 'DF7350', 'position' => 'front'],
                ['producer' => 'TRW', 'part_number' => 'DF7351', 'position' => 'rear'],

                ['producer' => 'Bosch', 'part_number' => '0 986 479 917', 'position' => 'front'],
                ['producer' => 'Bosch', 'part_number' => '0 986 479 918', 'position' => 'rear'],

                ['producer' => 'ATE', 'part_number' => '24.0126-0340.1', 'position' => 'front'],
                ['producer' => 'ATE', 'part_number' => '24.0112-0426.1', 'position' => 'rear'],

                ['producer' => 'Ferodo', 'part_number' => 'DDF2096', 'position' => 'front'],
                ['producer' => 'Ferodo', 'part_number' => 'DDF2097', 'position' => 'rear'],

                ['producer' => 'Zimmermann', 'part_number' => '100.3354.20', 'position' => 'front'],
                ['producer' => 'Zimmermann', 'part_number' => '100.3355.20', 'position' => 'rear'],

                ['producer' => 'Textar', 'part_number' => '92231903', 'position' => 'front'],
                ['producer' => 'Textar', 'part_number' => '92232003', 'position' => 'rear'],
            ],
            'pads' => [
                ['producer' => 'TRW', 'part_number' => 'GDB1950', 'position' => 'front'],
                ['producer' => 'TRW', 'part_number' => 'GDB1951', 'position' => 'rear'],

                ['producer' => 'Bosch', 'part_number' => '0 986 494 716', 'position' => 'front'],
                ['producer' => 'Bosch', 'part_number' => '0 986 494 717', 'position' => 'rear'],

                ['producer' => 'ATE', 'part_number' => '13.0460-7192.2', 'position' => 'front'],
                ['producer' => 'ATE', 'part_number' => '13.0460-7193.2', 'position' => 'rear'],

                ['producer' => 'Ferodo', 'part_number' => 'FDB1950', 'position' => 'front'],
                ['producer' => 'Ferodo', 'part_number' => 'FDB1951', 'position' => 'rear'],

                ['producer' => 'Zimmermann', 'part_number' => '20990.170.1', 'position' => 'front'],
                ['producer' => 'Zimmermann', 'part_number' => '20991.170.1', 'position' => 'rear'],

                ['producer' => 'Textar', 'part_number' => '2356301', 'position' => 'front'],
                ['producer' => 'Textar', 'part_number' => '2356302', 'position' => 'rear'],
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
