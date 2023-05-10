<?php
use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;
use App\Models\Note;

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

Route::get('/notes', [NoteController::class, 'index']);

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
Route::get('notes/{slug}', [NoteController::class, 'show']); 





