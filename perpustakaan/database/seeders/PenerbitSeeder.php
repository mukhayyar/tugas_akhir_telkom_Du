<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenerbitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('penerbit')->insert([
            'nama' => 'Suka Terbit',
            'lokasi' => 'Malang'
        ]);
        DB::table('penerbit')->insert([
            'nama' => 'Buku Buku',
            'lokasi' => 'Jakarta'
        ]);
        DB::table('penerbit')->insert([
            'nama' => 'Duta Buku',
            'lokasi' => 'Yogyakarta'
        ]);
    }
}
