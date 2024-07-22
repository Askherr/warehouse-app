<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use app\Models\Karyawan;


class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('karyawans')->insert([
            'nama' => fake()->name,
            'jabatan'=> fake()->jobTitle(),
            'pt'=> fake()->company(),
            'join_date'=> fake()->date,
            'no_sepatu'=> fake()->numberBetween(43,50),
        ]);
    }
}
