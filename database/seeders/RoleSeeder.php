<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder {
    public function run() {
        DB::table('roles')->insert([
            array(
                'name' => 'GOPL',
                'slug' => 'gopl',
                'panelFlag' => 1,
                'appFlag' => 1,
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ),
            array(
                'name' => 'Biocrux',
                'slug' => 'biocrux',
                'panelFlag' => 1,
                'appFlag' => 1,
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ),
            array(
                'name' => 'Report Manager',
                'slug' => 'report_manager',
                'panelFlag' => 1,
                'appFlag' => 1,
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ),
        ]);
    }
}
