<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/home', function () {
    return view('home', [
        //Key yang bisa dikirim langsung ke view
        "title" => "Dashboard",
        "nama" => "Salma Nadhira",
        "email" => "salmanadhira@apps.ipb.ac.id"
    ]);
});

Route::get('/notes', function () {
    $notes = [
        [
            "title" => "New Note",
            "slug" => "judul-post-pertama",
            "author" => "Salma Nadhira",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum blanditiis explicabo animi, ullam obcaecati voluptatum quaerat laboriosam necessitatibus recusandae, tempora, exercitationem aperiam consequuntur magni esse! Temporibus a placeat illo cumque!"
        ],
        [
            "title" => "New Note 2",
            "slug" => "judul-post-kedua",
            "author" => "Muhammad Zahran",
            "body" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsa, ducimus. Quas facilis voluptas provident quos rerum quod voluptate autem, adipisci, ab rem expedita dignissimos amet, libero optio reiciendis voluptatum beatae blanditiis inventore perspiciatis? Nobis fuga assumenda suscipit praesentium veritatis, id, dolor esse ipsum possimus modi laboriosam. Harum magnam fuga id, enim illum nihil. Saepe ipsum optio dicta exercitationem omnis fugit maiores totam assumenda et dignissimos, natus perspiciatis quis commodi neque eius atque hic quia adipisci accusamus excepturi facere, cupiditate vero."
        ]
    ];

    return view('notes', [
        "title" => "Notes",
        "notes" => $notes 
    ]);
});

Route::get('/login', function () {
    return view('login',);
});

Route::get('/moneybox', function () {
    return view('moneybox', [
        "title" => "MoneyBox"
    ]);
});

Route::get('/transactions', function () {
    return view('transactions', [
        "title" => "Transactions",
    ]);
});


//halaman single notes
Route::get('notes/{slug}', function($slug) {

    $notes = [
        [
            "title" => "New Note",
            "slug" => "judul-post-pertama",
            "author" => "Salma Nadhira",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum blanditiis explicabo animi, ullam obcaecati voluptatum quaerat laboriosam necessitatibus recusandae, tempora, exercitationem aperiam consequuntur magni esse! Temporibus a placeat illo cumque!"
        ],
        [
            "title" => "New Note 2",
            "slug" => "judul-post-kedua",
            "author" => "Muhammad Zahran",
            "body" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsa, ducimus. Quas facilis voluptas provident quos rerum quod voluptate autem, adipisci, ab rem expedita dignissimos amet, libero optio reiciendis voluptatum beatae blanditiis inventore perspiciatis? Nobis fuga assumenda suscipit praesentium veritatis, id, dolor esse ipsum possimus modi laboriosam. Harum magnam fuga id, enim illum nihil. Saepe ipsum optio dicta exercitationem omnis fugit maiores totam assumenda et dignissimos, natus perspiciatis quis commodi neque eius atque hic quia adipisci accusamus excepturi facere, cupiditate vero."
        ]
    ];

    $note;
    foreach($notes as $note) {
        if($note["slug"] === $slug) {
            $new_note = $note;
        }
    }
    return view('note', [
        "title" => "Single note",
        "note" => $new_note
    ]);
}); 





