<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Note;
use App\Models\Kategorinotes;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // User::create([
        //     'name' => 'Salma',
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


        // Kategorinotes::create([
        //     'nama' => 'Academics',
        //     'slug' => 'academics',   
        // ]);

        // Kategorinotes::create([
        //     'nama' => 'Personal',
        //     'slug' => 'personal',   
        // ]);

        Note::create([
            'judul_note' => 'Notulensi Rapat',
            'kategorinotes_id' => 2,
            'slug' => 'notulensi',
            'excerpt_note' => 'Notul rapat',
            'kategori_note' => 'Personal',
            'isi_note' => 'Notul rapat kemarin ditulis disini'
        ]);



        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
