<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Karyawan;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
                //
                for ($i = 0; $i < 100; $i++) {
                    DB::table("barangkeluars")->insert([
                // DB::table('karyawans')->insert([
                    'nama' => fake()->name,
                    'jabatan'=> fake()->jobTitle(),
                    'tgl_brg_out'=> fake()->dateTime(),
                    'pt'=> fake()->company(),
                    'kode_brg'=> fake()->countryCode(),
                    'nama_brg'=> fake()->domainName(),
                    'merk'=> fake()->colorName(),
                    'jenis'=> fake()->country(),
                    'jumlah'=> fake()->numberBetween(1,1000),
                    'created_at'=>now(),

                ]);
    }
}}
