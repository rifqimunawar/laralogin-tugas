<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('phones')->insert([
            'phone' => '08512345',
            'penghuni_id' =>'1',
        ]);
        DB::table('phones')->insert([
            'phone' => '08512345',
            'penghuni_id' =>'2',
        ]);
    }
}
