<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KamarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kamars')->insert([
            'name' => 'kamar 1 lantai 1',
        ]);
        DB::table('kamars')->insert([
            'name' => 'kamar 2 lantai 1',
        ]);
        DB::table('kamars')->insert([
            'name' => 'kamar 1 lantai 2',
        ]);
        DB::table('kamars')->insert([
            'name' => 'kamar 2 lantai ',
        ]);
    }
}
