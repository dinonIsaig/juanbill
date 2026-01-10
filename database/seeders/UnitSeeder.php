<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    public function run()
    {
        $bldgs = 3;
        $floors = 3;
        $units_per_floor = 10;

        $units = [];
        for ($bldg = 1; $bldg <= $bldgs; $bldg++) {
            for ($floor = 1; $floor <= $floors; $floor++) {
                for ($unit = 1; $unit <= $units_per_floor; $unit++) {

                    $custom_id = intval($bldg . $floor . sprintf('%02d', $unit));

                    $units[] = [
                        'unit_id' => $custom_id,
                        'unit_area' => '45sqm',
                        'bldg_no' => $bldg,
                        'floor_no' => $floor,
                        'unit_no' => $unit,
                    ];
                }
            }
        }
        DB::table('units')->insert($units);
    }
}
