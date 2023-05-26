<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Pemasukan;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Note;
use App\Models\Kategorinotes;
use App\Models\Kategoripemasukan;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // User::create([
        //     'namalengkap' => 'Salma',
        //     'username' => 'salma123',
        //     'email' => 'salma@gmail.com',
        //     'password' => bcrypt('12345')

        // ]);

        // Note::create([
        //     'judul_note' => 'Strukdat Pekan 10',
        //     'kategorinotes_id' => 1,
        //     'slug' => 'strukdat-pekan-10',
        //     'excerpt_note' => 'Test',
        //     'kategori_note' => 'College',
        //     'isi_note' => 'Catatan struktur data disimpan disini'
        // ]);
        
        
        // Note::create([
        //     'judul_note' => 'Pemrog Pekan 10',
        //     'kategorinotes_id' => 1,
        //     'slug' => 'pemrog-pekan-10',
        //     'excerpt_note' => 'Java Inheritance',
        //     'kategori_note' => 'College',
        //     'isi_note' => 'Catatan pemrog disimpan disini'
        // ]);

        // Note::create([
        //     'judul_note' => 'Notulensi Rapat',
        //     'kategorinotes_id' => 2,
        //     'slug' => 'notulensi',
        //     'kategori_note' => 'Personal',
        //     'isi_note' => 'Notul rapat kemarin ditulis disini'
        // ]);

        //  Note::create([
        //     'judul_note' => 'Strukdat Pekan 10',
        //     'kategorinotes_id' => 1,
        //     'slug' => 'strukdat-pekan-10',
        //     'kategori_note' => 'College',
        //     'isi_note' => 'Catatan struktur data disimpan disini',
        //     'user_id' => 13
        // ]);

        // Note::create([
        //     'judul_note' => 'GKV Tugas Akhir',
        //     'kategorinotes_id' => 1,
        //     'kategori_note' => 'Academics',
        //     'slug' => 'gkv-tugas-akhir',
        //     'isi_note' => 'Catatan GKV disimpan disini',
        //     'user_id' => 13
        // ]);


        // Note::create([
        //     'judul_note' => 'Notulensi Rapim',
        //     'kategorinotes_id' => 2,
        //     'slug' => 'notulensi-rapim',
        //     'isi_note' => 'Notul rapim',
        //     'user_id' => 13
        // ]);

        // Kategorinotes::create([
        //     'nama' => 'Academics',
        //     'slug' => 'academics',   
        // ]);

        // Kategorinotes::create([
        //     'nama' => 'Himalkom',
        //     'slug' => 'himalkom',   
        // ]);

        // Kategorinotes::create([
        //     'nama' => 'Gemastik',
        //     'slug' => 'Gemastik',   
        // ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Kategoripemasukan::create([
        //     'nama' => 'Bisnis',
        //     'slug' => 'bisnis',   
        // ]);

        // Kategoripemasukan::create([
        //     'nama' => 'Beasiswa',
        //     'slug' => 'Beasiswa',   
        // ]);

        // Kategoripemasukan::create([
        //     'nama' => 'Orang tua',
        //     'slug' => 'orang-tua',   
        // ]);

        // Pemasukan::create([
        //     'userspemasukan_id' => 13,
        //     'judul_pemasukan' => 'Gaji bulan Mei',
        //     'kategoripemasukan_id' => 2,
        //     'pemasukan_nominal' => 50000,
        // ]);

        Pemasukan::create([
            'userspemasukan_id' => 13,
            'judul_pemasukan' => 'Hasil Danus',
            'kategoripemasukan_id' => 1,
            'pemasukan_nominal' => 100000,
        ]);
    }
}

