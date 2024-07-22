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
        for ($i = 0; $i < 100; $i++) {
            DB::table("karyawans")->insert([
        // DB::table('karyawans')->insert([
            'nama' => fake()->name,
            'jabatan'=> fake()->jobTitle(),
            'pt'=> fake()->company(),
            'join_date'=> fake()->dateTimeThisDecade(now()),
            'no_sepatu'=> fake()->numberBetween(43,50),
            'created_at'=>now(),
        ]);
    }}
}
