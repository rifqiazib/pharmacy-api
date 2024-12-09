<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicineCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        $timeStamp = Carbon::now();
        DB::table('medicine_categories')->insert([
            [
                'code' => 'ANGSK',
                'name' => 'Analgesik',
                'description' => 'Mengurangi rasa nyeri, seperti sakit kepala, nyeri otot, dan nyeri pasca operasi',
                'created_at' => $timeStamp,
                'updated_at' => $timeStamp
            ],
            [
                'code' => 'ANTBK',
                'name' => 'Antibiotik',
                'description' => 'Membunuh atau menghambat pertumbuhan bakteri penyebab infeksi',
                'created_at' => $timeStamp,
                'updated_at' => $timeStamp
            ],
            [
                'code' => 'ANTPT',
                'name' => 'Antipiretik',
                'description' => 'Menurunkan suhu tubuh pada saat demam',
                'created_at' => $timeStamp,
                'updated_at' => $timeStamp
            ]
        ]);
    }
}
