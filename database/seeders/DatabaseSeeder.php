<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Transaksi;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Note;
use App\Models\Kategorinotes;
use App\Models\Kategoritransaksi;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       
        //Step 1: Bikin Kategorinotes
        Kategorinotes::create([
            'nama' => 'Akademik',
            'slug' => 'akademik',   
        ]);

        Kategorinotes::create([
            'nama' => 'Pribadi',
            'slug' => 'pribadi',   
        ]);

        Kategorinotes::create([
            'nama' => 'Organisasi',
            'slug' => 'organisasi',   
        ]);

        //Step 2: Bikin Kategoritransaksi
        Kategoritransaksi::create([
            'nama' => 'Orang tua',
            'slug' => 'orang-tua',   
        ]);

        Kategoritransaksi::create([
            'nama' => 'Beasiswa',
            'slug' => 'beasiswa',   
        ]);

        Kategoritransaksi::create([
            'nama' => 'Bisnis',
            'slug' => 'bisnis',   
        ]);

        Kategoritransaksi::create([
            'nama' => 'Makan dan Minum',
            'slug' => 'makan-dan-minum',   
        ]);

        Kategoritransaksi::create([
            'nama' => 'Akomodasi',
            'slug' => 'akomodasi',   
        ]);

        Kategoritransaksi::create([
            'nama' => 'Pribadi',
            'slug' => 'pribadi',   
        ]);

        Kategoritransaksi::create([
            'nama' => 'Kuliah',
            'slug' => 'kuliah',   
        ]);
    }
}

