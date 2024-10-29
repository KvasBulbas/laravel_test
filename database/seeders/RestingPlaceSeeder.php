<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RestingPlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('resting_places')->insert([
            'name' => Str::random(10),
            'longitude' => 180 * (mt_rand() / mt_getrandmax()),
            'latitude' => 180 * (mt_rand() / mt_getrandmax()),
        ]);
    }

}
